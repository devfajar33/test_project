<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Tags;
use DB;
use Auth;
use Carbon\Carbon;

class TagsController extends Controller
{
    //
    public function index()
    {
        $data = Tags::get();
        return view('pages.tags.tag',  compact('data'));
    }

    public function add()
    {
        $action = "input.tag";
        $param = '0';
        return view('pages.tags.tag_input', compact('action', 'param'));
    }

    public function store(Request $request)
    {
        DB::begintransaction();
        try
        {
            foreach($request->tag_name as $key => $items)
            {
                if($request->tag_name[$key] != null)
                {
                    if(Tags::where('name', 'like', '%'.$request->tag_name[$key].'%')->count() == 0)
                    {
                        $save = new Tags;
                        $save->name = $request->tag_name[$key];
                        $save->created_at = Carbon::now();
                        $save->save();
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
            return redirect()->route('tag');
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
            $save = new Tags;
            $save->exists = true;
            $save->id = $request->id; //already exists in database.
            $save->name = $request->tag_name;
            $save->save();

            DB::commit();
            alert()->success('Success','Data has been updated. !');
            return redirect()->route('tag');
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
            $action = "update.tag";
            $param = '1';
            $edit_data = Tags::where('id', $id)->first();

            return view('pages.tags.tag_edit', compact('action', 'param', 'edit_data'));
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
            $data = Tags::find($id);
            $data->delete();

            DB::commit();
            alert()->success('Success','Successfuly deleted !');
            return redirect()->route('tag');
        }
        catch (\Throwable $th) {
            alert()->warning('Warning', 'Data not found !');
            DB::rollback();
        }
    }
}
