<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'header', 
        'prev_text', 
        'image_art', 
        'tgl', 
        'article'
    ];

    // public function tgl() {
    //     return Attribute::make(
    //         get: fn($value) => Carbon::parse($value)->format('d-m-y')
    //     );
    // }

    protected function getTglAttribute($value)
    {
        return Carbon::parse($value)->format('d M Y');
    }
}
