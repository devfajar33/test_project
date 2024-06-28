<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessImport extends Model
{
    use HasFactory;

    protected $table = 'success_import';
    protected $fillable = [ 'id', 'total_baris'];
    
    public static function object_by_id($field, $id)
    {
        return self::select($field)->where('id', $id)->first()->field;
    }
}
