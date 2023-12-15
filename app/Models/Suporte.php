<?php

namespace App\Models;

use App\Enums\SuporteStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Suporte extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'assunto',
        'descricao',
        'status'
    ];
  

    public function status(): Attribute
    {
        return Attribute::make(
            set: fn (SuporteStatus $status) => $status->name,
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function respostas(): HasMany
    {
        return $this->hasMany(RespostaSuporte::class);
    }
}