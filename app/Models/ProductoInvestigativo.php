<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoInvestigativo extends Model
{
    /** @use HasFactory<\Database\Factories\ProductoInvestigativoFactory> */
    use HasFactory;

    protected $fillable = [
        'titulo',
        'resumen',
        'grupo_investigacion_id',
        'user_id',
        'sub_tipo_producto_id',
    ];

    // Relación con el usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación con el grupo de investigación
    public function grupoInvestigacion()
    {
        return $this->belongsTo(GrupoInvestigacion::class, 'grupo_investigacion_id');
    }

    // Relación con el subtipo de producto
    public function subTipoProducto()
    {
        return $this->belongsTo(SubTipoProducto::class, 'sub_tipo_producto_id');
    }

    // Relación con las entregas
    public function entregas()
    {
        return $this->hasMany(EntregaProducto::class, 'producto_investigativo_id');
    }
}
