<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    protected $fillable = [ 'id', 'products_id', 'services_id', 'quantity_buy', 'paid_price', 'created_at'];
    public $incrementing = false;

    public static function object_by_id($field, $id)
    {
        return self::select($field)->where('id', $id)->first()->field;
    }
}
