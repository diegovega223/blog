<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['titulo', 'cuerpo', 'id_user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
