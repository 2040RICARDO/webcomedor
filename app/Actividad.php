<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
   protected $table = 'actividad';
   protected $primarykey = 'id';
   protected $fillable = [
        'id', 'actividad', 'comentario', 'fecha_actividad'];
  
}
