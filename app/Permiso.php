<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
       protected $table = 'permiso';
    protected $primarykey = 'id';
    protected $fillable = [
        'id', 'motivo', 'fecha_inicio', 'fecha_final', 'totaldias', 'fecha_modificacion', 'observacion', 'comensal_id', 'tarjeta_id'];
    
    
    
    public function tarjeta(){
        return $this->belongsTo(Tarjeta::class);
    }
    
    
    public function comensal()
    {
        return $this->belongsTo(Comensal::class);
    }
}
