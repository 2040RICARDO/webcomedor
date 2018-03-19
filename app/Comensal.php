<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comensal extends Model
{
    protected $table='comensal';
    protected $primarykey='id';
    protected $fillable =[
        'id', 'nombre', 'apellido', 'ci', 'procedencia', 'numero','genero', 'imagen', 'carreras_id'
    ];

    public function tarjeta()
    {
        return $this->hasMany(Tarjeta::class);
    }
    
    
    
    public function permiso()
    {
        return $this->hasMany(Permiso::class);
    }
    public function suspender()
    {
        return $this->hasMany(Suspender::class);
    }
    public function eventual(){
        return $this->hasMany(Eventual::class);
    }
    public function carrera(){
        return $this->belongsTo(Carrera::class);
    }
    
}
