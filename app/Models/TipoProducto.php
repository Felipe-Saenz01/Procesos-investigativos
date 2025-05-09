<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    /** @use HasFactory<\Database\Factories\TipoProductoFactory> */
    use HasFactory;

    protected $fillable = ['nombre'];

    // Relación con SubTipoProducto
    public function subTiposProductos()
    {
        return $this->hasMany(SubTipoProducto::class);
    }
}
