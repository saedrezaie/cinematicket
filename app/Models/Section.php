<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'to',
        'from',
        'cinema_id',
        'movie_id'
    ];

    public
    function cinema(): BelongsTo
    {
        return $this->belongsTo(Cinema::class, "cinema_id")->with("city");
    }

    public
    function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public
    function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}
