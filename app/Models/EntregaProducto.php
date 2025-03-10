<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregaProducto extends Model
{
    /** @use HasFactory<\Database\Factories\EntregaPRoductoFactory> */
    use HasFactory;

    public function periodo() {
        return $this->belongsTo(Periodo::class);
    }
    public function productoInvestigativo() {
        return $this->belongsTo(ProductoInvestigativo::class);
    }
}
