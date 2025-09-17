<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'post_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['company_id','post_name','post_address','capacity'];

    protected static function booted()
    {
        static::creating(function ($post) {
            $post->post_id = (string) Str::uuid();
        });
    }

    public function company() { return $this->belongsTo(Company::class, 'company_id'); }
    public function items() { return $this->hasMany(Item::class, 'post_id'); }
    public function histories() { return $this->hasMany(ItemHistory::class, 'post_id'); }
}
