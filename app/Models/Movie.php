<?php

namespace App\Models;

use App\Http\Resources\TicketResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name',
        'minute',
        'category_id',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function sections(): HasMany
    {
        return $this->HasMany(Section::class)->with(["cinema" , "tickets"]);
    }

    public function tickets(): HasManyThrough
    {
        return $this->hasManyThrough(Ticket::class , Section::class);
    }
}
