<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSample extends Model
{
    use HasFactory;

    protected $table = 'data_import_excel';
    protected $fillable = [ 'PC', 'TRX_Ref_ID', 'Tanggal_TRX', 'Produk', 'Qty', 'No_Tujuan', 'Kode_Reseller', 'Reseller', 'Modul', 'Status', 'Tgl_Status', 'Nama_Supp', 'HB_Stock_Supp', 'H_Beli', 'H_Jual', 'Komisi', 'Laba', 'Poin', 'Reply_Provider', 'SN', 'Ref_id', 'Rate_TP', 'Rate', 'Shell', 'HBFIX', 'NOTES', 'K_Provider', 'Provider', 'K_Produk'];
    
    public static function object_by_id($field, $id)
    {
        return self::select($field)->where('id', $id)->first()->field;
    }
}
