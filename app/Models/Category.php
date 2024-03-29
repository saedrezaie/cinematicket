<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'uuid',
        'name',
        'parent_id'
    ];

    public function parent(): HasMany
    {
        return $this->hasMany(Category::class , 'parent_id' , 'id');
    }

    public function children(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function movies(): HasMany
    {
        return $this->hasMany(Movie::class);
    }
}
