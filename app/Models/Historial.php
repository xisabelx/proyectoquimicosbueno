<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Historial extends Model
{
    // Nombre de la tabla
    protected $table = 'historial';

    // Campos fillable
    protected $fillable = [
        'usuario',
        'id_producto',
        'movimiento',
        'cantidad',
        'motivo',
        'fecha',
    ];

    // Relación con la tabla productos
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }

    // Relación con la tabla users para el campo 'usuario'
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario', 'id');
    }
}
