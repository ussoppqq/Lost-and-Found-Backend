<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';
    protected $primaryKey = 'location_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['area_name','latitude','longitude'];

    protected static function booted()
    {
        static::creating(function ($location) {
            $location->location_id = (string) Str::uuid();
        });
    }
}
