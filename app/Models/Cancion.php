<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'idAcordes',
        'NombreCancion',
        'Autor',
        'Letra',
        'Gerero',
    ];
}
