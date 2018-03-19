<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'asistencia';
    protected $primarykey = 'id';
    protected $fillable = [
        'id', 'menu', 'fecha_asistencia', 'comensal_id', 'tarjeta_id', 'eventual_id'];
  
    public function tarjeta(){
        return $this->belongsTo(Tarjeta::class);
    }
    
    
    public function comensal()
    {
        return $this->belongsTo(Comensal::class);
    }

    public function eventual()
    {
        return $this->belongsTo(Eventual::class);
    }
}
