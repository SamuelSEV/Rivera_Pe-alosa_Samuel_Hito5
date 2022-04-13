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

    public function comentarios()
    {
        
        return $this->hasMany(Comentario::class, 'id', 'id_incidencia');
    }

    public function estados()
    {
        
        return $this->belongsTo(Estado::class, 'estado', 'id');
    }

    public function scopeTitulo($query, $titulo) {
    	if ($titulo) {
    		return $query->where('titulo','LIKE',"%$titulo%");
    	}
    }
    public function scopeEstado($query, $estado) {
    	if ($estado) {
            
    		return $query->where('estado','LIKE',"%$estado%");
    	}
    }
    public function scopeAula($query, $aula) {
    	if ($aula) {
            
    		return $query->where('aula','LIKE',"%$aula%");
    	}
    }
    public function scopeFecha($query, $fecha) {
    	if ($fecha) {
    		return $query->where('created_at','LIKE',"%$fecha%");
    	}
    }
}
