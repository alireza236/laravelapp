<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    //protected $primaryKey = 'id_dosen';

    protected $table = 'mata_kuliah';
    
    protected $fillable = [
        'id_dosen',
        'nama_matkul'
    ];

    public function dosen(){
        return $this->belongsTo('App\Dosen','id_dosen');
    }

}
