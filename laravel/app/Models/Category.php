<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['company_id','category_name','subcategory_name','retention_days','is_restricted'];

    protected static function booted()
    {
        static::creating(function ($category) {
            $category->category_id = (string) Str::uuid();
        });
    }

    public function company() { return $this->belongsTo(Company::class, 'company_id'); }
    public function items() { return $this->hasMany(Item::class, 'category_id'); }
}
