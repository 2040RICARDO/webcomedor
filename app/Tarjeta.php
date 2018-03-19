<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $table='tarjeta';
    protected $primarykey='id';
    protected $fillable=[
        'id', 'codigo', 'fecha_registro', 'estado', 'comentario', 'comensal_id'
    ];

    public function comensal(){
        return $this->belongsTo(Comensal::class);
    }
    
    public function permiso(){
        return $this->hasMany(Permiso::class);
    }
    public function suspender(){
        return $this->hasMany(Suspender::class);
    }
    public function eventual(){
        return $this->hasMany(Eventual::class);
    }
}

