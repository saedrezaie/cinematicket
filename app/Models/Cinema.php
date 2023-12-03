<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cinema extends Model
{
    use SoftDeletes;
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        "uuid",
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
        return $this->HasMany(Section::class)->with("tickets");
    }

    public function tickets():HasManyThrough
    {
        return $this->hasManyThrough(Ticket::class , Section::class);
    }
}
