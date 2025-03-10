<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoInvestigacion extends Model
{
    /** @use HasFactory<\Database\Factories\GrupoInvestigacionFactory> */
    use HasFactory;
    
    protected $fillable = ['nombre', 'correo'];

    public function usuarios()
    {
        // return $this->belongsToMany(User::class, 'grupo_investigacion_user', 'grupo_investigacion_id', 'user_id');
        return $this->hasMany(User::class);
    }

    public function productosInvestigativos() {
        return $this->hasMany(ProductoInvestigativo::class);
    }
}
