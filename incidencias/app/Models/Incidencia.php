<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;

    protected $table = "incidencias";

    protected $fillable = ['id', 'titulo', 'descripcion', 'aula', 'fecha_cierre', 'estado', 'creador', 'created_at', 'updated_at'];


    public function obtenerIncidencias()
    {
        return Incidencia::all();

    }

    public function obtenerIncidenciaId($id)
    {
        return Incidencia::find($id);
    }

    public function aulas()
    {
        
        return $this->belongsTo(Aula::class, 'aula', 'id');
    }

    public function autores()
    {
        
        return $this->belongsTo(Autor::class, 'creador', 'id');
    }

    public function estados()
    {
        
        return $this->belongsTo(Estado::class, 'estado', 'id');
    }
}
