<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class film extends Model
{
    use HasFactory;
    protected $table = 'film';

    protected $filmlabel = ['judul'
    ,'ringkasan'
    ,'tahun'
    ,'poster'
    ,'gentre_id'];

    public function Genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id',"id");
    }

   
}
