<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\DataSample;
use App\Models\FailedImport;
use App\Models\SuccessImport;
use App\Models\DataImportFile;
use App\Imports\DataSampleImport;
use DB;
use Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $data = DataSample::get();
        $dataSuccess = null;
        $dataFailed = null;
        $file = null;
        if(FailedImport::first() != null || SuccessImport::first() != null || DataImportFile::first() != null)
        {
            $dataSuccess = SuccessImport::first();
            $dataFailed = FailedImport::first();
            $file = DataImportFile::first()->file;
        }
        return view('pages.dashboard', compact('data', 'dataSuccess', 'dataFailed', 'file'));
    }

    public function import(Request $request)
    {
        DB::begintransaction();
        try
        {
            $file = $request->file('import_');      
            $nama_file = rand().$file->getClientOriginalName();  
            $file->move(public_path('assets/lib/doc'), $nama_file);
            
            Excel::import(new DataSampleImport, public_path('assets/lib/doc/'.$nama_file));

            $save = new DataImportFile();
            $save->file = $nama_file;
            $save->save();

            DB::commit();
            alert()->success('Success','Data has been saved. !');
            return redirect()->route('dashboard');
        }
        catch(\Exception $ex)
        {
            DB::rollback();
            alert()->error('Error',$ex);
            return back()->withInput();
        }
    }
}
