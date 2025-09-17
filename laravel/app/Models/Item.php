<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';
    protected $primaryKey = 'item_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'company_id','post_id','category_id','item_name','brand','color',
        'item_description','storage','item_status','retention_until','sensitivity_level'
    ];

    protected static function booted()
    {
        static::creating(function ($item) {
            $item->item_id = (string) Str::uuid();
        });
    }

    public function company() { return $this->belongsTo(Company::class, 'company_id'); }
    public function post() { return $this->belongsTo(Post::class, 'post_id'); }
    public function category() { return $this->belongsTo(Category::class, 'category_id'); }
    public function photos() { return $this->hasMany(ItemPhoto::class, 'item_id'); }
    public function reports() { return $this->hasMany(Report::class, 'item_id'); }
    public function claims() { return $this->hasMany(Claim::class, 'item_id'); }
    public function histories() { return $this->hasMany(ItemHistory::class, 'item_id'); }
}
