<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';

    protected $fillable = [
        'nama_dosen'
    ];

    public function mata_kuliah(){
        return $this->hasMany('App\MataKuliah','id_dosen');
    }
}
