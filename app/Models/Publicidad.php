<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publicidad extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nombre', 'url', 'fecha_expiracion', 'id_post'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }
}
