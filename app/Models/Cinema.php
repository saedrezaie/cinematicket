<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Cinema extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "phone",
        "address",
        "capacity",
        "city_id",
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function sections():HasMany
    {
        return $this->HasMany(Section::class)->with("ticket");
    }

    public function tickets():HasManyThrough
    {
        return $this->hasManyThrough(Ticket::class , Section::class);
    }
}
