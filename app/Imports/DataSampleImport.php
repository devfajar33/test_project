<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\DataSample;
use App\Models\FailedImport;
use App\Models\SuccessImport;

use DB;

class DataSampleImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $noSuccess = 0;
        $noFailed = 0;
        
        foreach ($rows as $row) 
        {      
            if($row[0] != null && $row[1] != null && $row[2] != null && $row[3] != null && $row[4] != null && $row[5] != null && $row[6] != null && $row[7] != null && $row[8] != null && $row[9] != null && $row[10] != null && $row[11] != null && $row[12] != null && $row[13] != null && $row[14] != null && $row[15] != null && $row[16] != null && $row[17] != null && $row[18] != null && $row[19] != null && $row[20] != null && $row[21] != null && $row[22] != null && $row[23] != null && $row[24] != null && $row[25] != null && $row[26] != null && $row[27] != null && $row[28] != null)
            {
                $noSuccess++;  

                $save = new DataSample;
                $save->PC = $row[0]; 
                $save->TRX_Ref_ID = $row[1]; 
                $save->Tanggal_TRX = $row[2]; 
                $save->Produk = $row[3];
                $save->Qty = $row[4]; 
                $save->No_Tujuan = $row[5]; 
                $save->Kode_Reseller = $row[6]; 
                $save->Reseller = $row[7]; 
                $save->Modul = $row[8]; 
                $save->Status = $row[9]; 
                $save->Tgl_Status = $row[10]; 
                $save->Nama_Supp = $row[11]; 
                $save->HB_Stock_Supp = $row[12]; 
                $save->H_Beli = $row[13]; 
                $save->H_Jual = $row[14]; 
                $save->Komisi = $row[15]; 
                $save->Laba = $row[16]; 
                $save->Poin = $row[17]; 
                $save->Reply_Provider = $row[18]; 
                $save->SN = $row[19]; 
                $save->Ref_id = $row[20]; 
                $save->Rate_TP = $row[21]; 
                $save->Rate = $row[22]; 
                $save->Shell = $row[23]; 
                $save->HBFIX = $row[24]; 
                $save->NOTES = $row[25]; 
                $save->K_Provider = $row[26]; 
                $save->Provider = $row[27]; 
                $save->K_Produk = $row[28];
                $save->save();
            }
            else
            {
                $noFailed++;
            }
        }
        if($noSuccess > 0)
        {
            $save = new SuccessImport;
            $save->total_baris = $noSuccess;
            $save->save();
        }
        if($noFailed > 0)
        {
            $save = new FailedImport;
            $save->total_baris = $noFailed;
            $save->save();
        }
    }
}
