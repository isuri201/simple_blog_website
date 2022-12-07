<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comment';

    protected $fillable = [
        'comment',
        'user_id',
        'post_id',
    ];

    public function user() {
        return $this->belongsTo(User::class , 'user_id');
    }
}
