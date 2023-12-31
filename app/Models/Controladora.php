<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ControladoraPortas;
use Illuminate\Database\Eloquent\SoftDeletes;

class Controladora extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'status',
        'numero_portas_analogicas',
        'numero_portas_digitais',
        'ip'
    ];

    public function portas()
    {
        return $this->hasMany(ControladoraPortas::class, 'controladora_id', 'id');
    }

}
