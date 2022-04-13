<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = "comentarios";

    protected $fillable = ['id', 'id_incidencia', 'autor', '', 'titulo', 'descripcion', 'fecha', 'created_at', 'updated_at'];


    public function obtenerComentarios()
    {
        return Comentario::all();

    }

    public function obtenerComentarioId($id)
    {
        return Comentario::find($id);
    }

    public function autores()
    {
        
        return $this->belongsTo(Autor::class, 'autor', 'id');
    }
    public function incidencias()
    {
      return $this->belongsTo(Incidencia::class, 'id_incidencia', 'id');
    }

}
