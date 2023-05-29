<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    protected $table = 'bands';

    public function getAverageRatingAttribute()
    {
        $totalRating = 0;
        $reviewCount = 0;

        foreach ($this->bookings as $booking) {
            foreach ($booking->reviews as $review) {
                $totalRating += $review->rating;
                $reviewCount++;
            }
        }

        return $reviewCount > 0 ? $totalRating / $reviewCount : 0;
    }

    public function scopeSearch($query, $terms){
        collect(explode(" ", $terms))
        ->filter()
        ->each(function($term) use ($query){
            $term = '%' .$term . '%';
            $query->where('band_name', 'like', $term);

        });
    }
}
