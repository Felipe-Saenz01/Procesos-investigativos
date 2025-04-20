<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    /** @use HasFactory<\Database\Factories\PeriodoFactory> */
    use HasFactory;

    protected $fillable = ['nombre', 'fecha_limite_planeacion', 'fecha_limite_evidencias'];

    protected $casts = [
        'fecha_limite_planeacion' => 'date',
        'fecha_limite_evidencias' => 'date',
    ];

    public function entregas() {
        return $this->hasMany(EntregaProducto::class);
    }
}
