<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'proj_id',
        'type',
        'play_random',
        'playlist',
        'playlist_http',
        'description',
        'status',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function project() {
        return $this->belongsTo(Project::class, 'proj_id');
    }
}
