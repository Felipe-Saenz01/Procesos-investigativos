<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'role', // Agregar el campo 'role'
        'grupo_investigacion_id', // Agregar la clave foránea
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn (string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }

    // Relación con ProductoInvestigativo
    public function productosInvestigativos(): BelongsToMany
    {
        return $this->belongsToMany(ProductoInvestigativo::class, 'producto_investigativo_user');
    }

    // Relacion con HorasInvestigacion
    public function horasInvestigacion(): HasMany
    {
        return $this->hasMany(HorasInvestigacion::class);
    }

    // Relación con GrupoInvestigacion
    public function gruposInvestigacion(): BelongsTo
    {
        return $this->belongsTo(GrupoInvestigacion::class, 'grupo_investigacion_id');
    }

    public function entregas(): HasMany
    {
        return $this->hasMany(EntregaProducto::class);
    }

    public function proyectos(): HasMany
    {
        return $this->hasMany(ProyectoInvestigacion::class);
    }
}
