<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class ItemPhoto extends Model
{
    use HasFactory;

    protected $table = 'item_photos';
    protected $primaryKey = 'photo_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['company_id','item_id','photo_url','alt_text','display_order'];

    protected static function booted()
    {
        static::creating(function ($photo) {
            $photo->photo_id = (string) Str::uuid();
        });
    }

    public function item() { return $this->belongsTo(Item::class, 'item_id'); }
    public function company() { return $this->belongsTo(Company::class, 'company_id'); }
}
