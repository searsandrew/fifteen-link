<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Shetabit\Visitor\Traits\Visitable;

class Link extends Model
{
    use HasUlids, SoftDeletes, Visitable;

    protected $fillable = ['destination'];

    protected static function boot(): void
    {
        parent::boot();
        self::creating(function ($model) {
            $model->ref_id = Str::random(6);
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
