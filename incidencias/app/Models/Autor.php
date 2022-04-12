<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = "users";

    protected $fillable = ['id', 'name', 'email', 'rol'];
  

    public function incidencias()
    {
      return $this->hasMany(Incidencia::class, 'id', 'creador');
    }
}
