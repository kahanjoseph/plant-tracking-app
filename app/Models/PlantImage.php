<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantImage extends Model
{
    /** @use HasFactory<\Database\Factories\PlantImageFactory> */
    use HasFactory;

    protected $fillable = [
        'plant_id',
        'image_path',
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
