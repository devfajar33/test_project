<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataImportFile extends Model
{
    use HasFactory;

    protected $table = 'data_import_excel_file';
    protected $fillable = [ 'file', 'created_at'];
    
    public static function object_by_id($field, $id)
    {
        return self::select($field)->where('id', $id)->first()->field;
    }
}
