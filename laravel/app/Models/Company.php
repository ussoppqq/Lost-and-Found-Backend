<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $primaryKey = 'company_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['company_name', 'company_address'];

    protected static function booted()
    {
        static::creating(function ($company) {
            $company->company_id = (string) Str::uuid();
        });
    }

    // Relasi
    public function users() { return $this->hasMany(User::class, 'company_id'); }
    public function posts() { return $this->hasMany(Post::class, 'company_id'); }
    public function categories() { return $this->hasMany(Category::class, 'company_id'); }
    public function items() { return $this->hasMany(Item::class, 'company_id'); }
    public function reports() { return $this->hasMany(Report::class, 'company_id'); }
    public function claims() { return $this->hasMany(Claim::class, 'company_id'); }
    public function histories() { return $this->hasMany(ItemHistory::class, 'company_id'); }
}
