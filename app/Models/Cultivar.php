<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cultivar extends Model
{
    /** @use HasFactory<\Database\Factories\CultivarFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'species_id',
    ];

    public function species()
    {
        return $this->belongsTo(Species::class);
    }

    public function plants()
    {
        return $this->belongsToMany(Plant::class);
    }
}
