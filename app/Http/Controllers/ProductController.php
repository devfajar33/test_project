<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Products;
use App\Models\Tags;
use DB;
use Auth;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class ProductController extends Controller
{
    //
    public function index()
    {
        $data = Products::get();
        return view('pages.products.product',  compact('data'));
    }

    public function add()
    {
        $action = "input.product";
        $param = '0';
        return view('pages.products.product_input', compact('action', 'param'));
    }

    public function store(Request $request)
    {
        DB::begintransaction();
        try
        {
            foreach($request->product_name as $key => $items)
            {
                if($request->product_name[$key] != null)
                {
                    if(Products::where('name', 'like', '%'.$request->product_name[$key].'%')->count() == 0)
                    {
                        $uuid = Uuid::uuid1();

                        $save = new Products;
                        $save->id = $uuid->toString();
                        $save->name = $request->product_name[$key];
                        $save->quantity = $request->qty[$key];
                        $save->purchasing_price = $request->purchasing_price[$key];
                        $save->selling_price = $request->selling_price[$key];
                        $save->created_at = Carbon::now();
                        $save->save();

                        $save_tags = new Tags();
                        $save_tags->id = $uuid->toString();
                        $save_tags->created_at = Carbon::now();
                        $save_tags->save();

                    }
                    else
                    {
                        DB::rollback();
                        alert()->error('Error','Double data. !');
                        return back()->withInput();
                    }
                }
            }

            DB::commit();
            alert()->success('Success','Data has been saved. !');
            return redirect()->route('product');
        }
        catch(\Exception $ex)
        {
            DB::rollback();
            alert()->error('Error','Something went wrong !');
            return back()->withInput();
        }
    }

    public function update(Request $request)
    {
        DB::begintransaction();
        try
        {
            $save = new Products;
            $save->exists = true;
            $save->id = $request->id; //already exists in database.
            $save->name = $request->product_name;
            $save->quantity = $request->qty;
            $save->purchasing_price = $request->purchasing_price;
            $save->selling_price = $request->selling_price;
            $save->updated_at = Carbon::now();
            $save->save();

            $save_tags = new Tags();
            $save_tags->id = $request->id;
            $save_tags->created_at = Carbon::now();
            $save_tags->save();

            DB::commit();
            alert()->success('Success','Data has been updated. !');
            return redirect()->route('product');
        }
        catch(\Exception $ex)
        {
            DB::rollback();
            alert()->error('Error','Something went wrong !');
            return back()->withInput();
        }
    }

    public function edit($id)
    {
        DB::begintransaction();
        try {
            $action = "update.product";
            $param = '1';
            $edit_data = Products::where('id', $id)->first();

            return view('pages.products.product_edit', compact('action', 'param', 'edit_data'));
        } catch (\Throwable $th) {
            alert()->warning('Warning', 'Data not found !');
            DB::rollback();
        }
    }

    public function delete($id)
    {
        DB::begintransaction();
        try
        {
            $data = Products::find($id);
            $data->delete();

            $save_tags = new Tags();
            $save_tags->id = $id;
            $save_tags->deleted_at = Carbon::now();
            $save_tags->save();

            DB::commit();
            alert()->success('Success','Successfuly deleted !');
            return redirect()->route('product');
        }
        catch (\Throwable $th) {
            alert()->warning('Warning', 'Data not found !');
            DB::rollback();
        }
    }
}
