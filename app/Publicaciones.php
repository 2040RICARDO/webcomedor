<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    protected $table='publicaciones';
    protected $primarykey='id';
    protected $fillable =[
        'id', 'nombre', 'estado', 'fechapublicacion','descripcion','ruta'
    ];

    public function user(){
        return $this->belongsTo('App\User','users_id','id');
    }
}
