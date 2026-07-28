<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    /** @use HasFactory<\Database\Factories\PlantFactory> */
    use HasFactory;

    protected $fillable = [
        'orlah_date',
        'planted_date',
        'species_id',
        'description',
        'location',
        'source',
        'name',
    ];

    public function species()
    {
        return $this->belongsTo(Species::class);
    }

    public function images()
    {
        return $this->hasMany(PlantImage::class);
    }

    public function cultivars()
    {
        return $this->belongsToMany(Cultivar::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
