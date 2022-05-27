<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compania extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'correo', 'logo', 'pagina web'];
}
