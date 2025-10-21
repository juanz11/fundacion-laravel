<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'message',
        'phone',
        'status',
        'read_at',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    /**
     * Relación con el usuario que envió el mensaje
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Marcar mensaje como leído
     */
    public function markAsRead()
    {
        $this->update([
            'status' => 'leido',
            'read_at' => now(),
        ]);
    }

    /**
     * Marcar mensaje como respondido
     */
    public function markAsResponded()
    {
        $this->update([
            'status' => 'respondido',
        ]);
    }

    /**
     * Verificar si el mensaje es nuevo
     */
    public function isNew()
    {
        return $this->status === 'nuevo';
    }

    /**
     * Scope para mensajes nuevos
     */
    public function scopeNew($query)
    {
        return $query->where('status', 'nuevo');
    }

    /**
     * Scope para mensajes leídos
     */
    public function scopeRead($query)
    {
        return $query->where('status', 'leido');
    }

    /**
     * Scope para mensajes respondidos
     */
    public function scopeResponded($query)
    {
        return $query->where('status', 'respondido');
    }
}
