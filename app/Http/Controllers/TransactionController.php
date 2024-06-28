<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Products;
use App\Models\Services;
use App\Models\Tags;
use App\Models\Transaction;
use DB;
use Auth;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class TransactionController extends Controller
{
    //
    public function index()
    {
        $data = Transaction::select('transaction.id','products.name as products', 'services.name as services', 'quantity_buy', 'paid_price')
                            ->join('products', 'products.id', '=', 'transaction.products_id')
                            ->join('services', 'services.id', '=', 'transaction.services_id')
                            ->get();
        return view('pages.transactions.transaction',  compact('data'));
    }

    public function add()
    {
        $action = "update.transaction";
        $param = '0';
        $data_product = Products::where('quantity', '>', '1')->get();
        $data_service = Services::get();
        return view('pages.transactions.transaction_input', compact('action', 'param', 'data_product', 'data_service'));
    }

    public function update(Request $request)
    {
        DB::begintransaction();
        try
        {
            $data_product_selling = Products::where('id', $request->products)->first();
            $data_service_selling = Services::where('id', $request->services)->first();
            $total = ($data_product_selling->selling_price * $request->qty_paid) + $data_service_selling->selling_price;

            if($data_product_selling->quantity >= $request->qty_paid)
            {
                if($request->paid_price >= $total)
                {
                    $uuid = Uuid::uuid1();

                    $save = new Transaction;
                    $save->id = $uuid->toString();
                    $save->products_id = $request->products;
                    $save->services_id = $request->services;
                    $save->quantity_buy = $request->qty_paid;
                    $save->paid_price = $request->paid_price;
                    $save->created_at = Carbon::now();
                    $save->save();

                    $save_product = new Products;
                    $save_product->exists = true;
                    $save_product->id = $data_product_selling->id; //already exists in database.
                    $save_product->quantity = $data_product_selling->quantity - $request->qty_paid;
                    $save_product->updated_at = Carbon::now();
                    $save_product->save();

                    $save_tags = new Tags();
                    $save_tags->id = $uuid->toString();
                    $save_tags->created_at = Carbon::now();
                    $save_tags->save();

                    DB::commit();
                    alert()->success('Success','Data has been saved. !');
                    return redirect()->route('transaction');
                }
                else
                {
                    DB::rollback();
                    alert()->warning('Warning','Pembayaran kurang dari harga barang !');
                    return back()->withInput();
                }
            }
            else
            {
                DB::rollback();
                alert()->warning('Warning','Quantity barang kurang dari quantity permintaan !');
                return back()->withInput();
            }
        }
        catch(\Exception $ex)
        {
            DB::rollback();
            alert()->error('Error','Something went wrong !');
            return back()->withInput();
        }
    }
}
