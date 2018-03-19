<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suspender extends Model
{
       protected $table = 'suspender';
    protected $primarykey = 'id';
    protected $fillable = [
        'id', 'motivo','fecha_inicio', 'fecha_conclucion', 'asignacion', 'comensal_id', 'tarjeta_id'];
    
    
    
    public function tarjeta(){
        return $this->belongsTo(Tarjeta::class);
    }
    
    
    public function comensal()
    {
        return $this->belongsTo(Comensal::class);
    }
    
    public function eventual(){
        return $this->hasMany(Eventual::class);
    }
}
