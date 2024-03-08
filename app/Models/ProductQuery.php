<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQuery extends Model
{
    use HasFactory;

    protected $fillable = [
       'product_id',
       'keywords',
       'query',
       'response',
    ];

    public static function enabled() {
        return false;
    }

}
