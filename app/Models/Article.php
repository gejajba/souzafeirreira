<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'active' => 'boolean',
        'order' => 'integer',
        'published_at' => 'datetime',
    ];

    /**
     * Utilizar slug nas rotas por padrão.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Garante que a chave da rota nunca seja nula ou vazia.
     */
    public function getRouteKey(): mixed
    {
        return $this->slug ?: (Str::slug($this->title) ?: (string) $this->id);
    }

    /**
     * Resolução de Route Model Binding (por slug ou por ID).
     */
    public function resolveRouteBinding($value, $field = null): ?self
    {
        $field = $field ?? $this->getRouteKeyName();

        if ($field === 'slug') {
            return $this->where('slug', $value)
                ->orWhere('id', is_numeric($value) ? (int) $value : 0)
                ->first();
        }

        return parent::resolveRouteBinding($value, $field);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order')->orderByDesc('created_at');
    }

    /**
     * Estima o tempo de leitura do artigo em minutos.
     */
    public function readingTime(): int
    {
        $words = str_word_count(strip_tags($this->summary.' '.$this->content));

        return max(1, (int) ceil($words / 200));
    }

    /**
     * Gera slug automaticamente a partir do título se não definido.
     */
    protected static function booted(): void
    {
        static::saving(function (Article $article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title);
            }
        });
    }
}
