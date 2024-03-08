<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ELearning extends Model
{
    use HasFactory;

    protected $fillable = [
        'catagory_id',
        'name',
        'description',
        'preview',
        'mime_type',
        'url',
        'url_http',
        'password',
        'status',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function catagory() {
        return $this->belongsTo(ELearningCatagory::class, 'catagory_id');
    }
}
