<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $table = "aulas";

    protected $fillable = ['id', 'nombre'];
  

    public function obtenerAulas()
    {
        return Aula::all();
    }

    public function obtenerAulaId($id)
    {
        return Aula::find($id);
    }

    public function incidencias()
    {
      return $this->hasMany(Incidencia::class, 'id', 'aula');
    }
}

