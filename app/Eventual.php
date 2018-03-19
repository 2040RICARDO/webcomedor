<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventual extends Model
{
      protected $table='eventual';
    protected $primarykey='id';
    protected $fillable =[
        'id', 'nombre', 'apellido', 'ci', 'carrera', 'procedencia', 'numero','genero','imagen', 'fecha_inicio', 'fecha_final', 'suspender_id', 'comensal_id', 'tarjeta_id'
    ];

    public function suspender()
    {
        return $this->belongsTo(Suspender::class);
    }


     public function comensal()
    {
        return $this->belongsTo(Comensal::class);
    }

     public function tarjeta(){
        return $this->belongsTo(Tarjeta::class);
    }

    public function asistencia()
    {
        return $this->hasMany(Asistencia::class);
    }


}
