<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [ 'id', 'name', 'quantity', 'purchasing_price', 'selling_price', 'created_at'];
    public $incrementing = false;

    public static function object_by_id($field, $id)
    {
        return self::select($field)->where('id', $id)->first()->field;
    }
}
