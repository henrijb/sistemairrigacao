<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ControladoraPortas extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'controladora_id',
        'nome',
        'tipo',
        'status',
    ];
}
