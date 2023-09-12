<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControladoraPortas extends Model
{
    use HasFactory;

    protected $fillable = [
        'controladora_id',
        'nome',
        'status',
    ];
}
