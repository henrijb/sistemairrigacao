<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Planta extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'data_plantacao',
        'percentual_umidade',
        'ultima_rega',
        'status',
        'porta_arduino_analogica',
        'porta_arduino_digital',
        'id_arduino',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        //'id_arduino',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'data_plantacao'  => 'date',
        'ultima_rega' => 'datetime:Y-m-d H:i',
    ];

    public function controladora()
    {
        return $this->belongsTo(Controladora::class, 'id_arduino');
    }

    public function controladoraPortaAnalogica()
    {
        return $this->hasOne(ControladoraPortas::class, 'id' , 'porta_arduino_analogica');
    }

    public function controladoraPortaDigital()
    {
        return $this->hasOne(ControladoraPortas::class, 'id' , 'porta_arduino_digital');
    }

}
