<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChangePost extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'Changes_posts';

    protected $fillable = ['id_post', 'id_user', 'titulo', 'cuerpo'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function tieneCambios()
    {
        return $this->titulo || $this->cuerpo;
    }
}

