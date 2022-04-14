<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = "users";

    protected $fillable = ['id', 'name', 'email', 'rol', 'notificacion', 'validacion'];

    public function obtenerUsuarios()
    {
        return Autor::all();
    }
  
    public function obtenerUsuarioId($id)
    {
        return Autor::find($id);
    }
    public function incidencias()
    {
      return $this->hasMany(Incidencia::class, 'id', 'creador');
    }
    public function comentarios()
    {
      return $this->hasMany(Comentario::class, 'id', 'autor');
    }
}
