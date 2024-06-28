<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Services;
use App\Models\Tags;
use DB;
use Auth;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class ServiceController extends Controller
{
    //
    public function index()
    {
        $data = Services::get();
        return view('pages.services.service',  compact('data'));
    }

    public function add()
    {
        $action = "input.service";
        $param = '0';
        return view('pages.services.service_input', compact('action', 'param'));
    }

    public function store(Request $request)
    {
        DB::begintransaction();
        try
        {
            foreach($request->service_name as $key => $items)
            {
                if($request->service_name[$key] != null)
                {
                    if(Services::where('name', 'like', '%'.$request->service_name[$key].'%')->count() == 0)
                    {
                        $uuid = Uuid::uuid1();

                        $save = new Services;
                        $save->id = $uuid->toString();
                        $save->name = $request->service_name[$key];
                        $save->base_price = $request->base_price[$key];
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
            return redirect()->route('service');
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
            $save = new Services;
            $save->exists = true;
            $save->id = $request->id; //already exists in database.
            $save->name = $request->service_name;
            $save->base_price = $request->base_price;
            $save->selling_price = $request->selling_price;
            $save->save();

            $save_tags = new Tags();
            $save_tags->id = $request->id;
            $save_tags->created_at = Carbon::now();
            $save_tags->save();

            DB::commit();
            alert()->success('Success','Data has been updated. !');
            return redirect()->route('service');
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
            $action = "update.service";
            $param = '1';
            $edit_data = Services::where('id', $id)->first();

            return view('pages.services.service_edit', compact('action', 'param', 'edit_data'));
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
            $data = Services::find($id);
            $data->delete();

            $save_tags = new Tags();
            $save_tags->id = $id;
            $save_tags->deleted_at = Carbon::now();
            $save_tags->save();

            DB::commit();
            alert()->success('Success','Successfuly deleted !');
            return redirect()->route('service');
        }
        catch (\Throwable $th) {
            alert()->warning('Warning', 'Data not found !');
            DB::rollback();
        }
    }
}
