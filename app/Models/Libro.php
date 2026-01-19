<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = ['titulo', 'autor', 'anho', 'genero', 'descripcion'];

    public function createLibro($data)
    {
        return $this->create($data);
    }

    public function getLibro()
    {
        return $this->all();
    }

}
