<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['company_id','role_id','full_name','email','phone_number'];

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->user_id = (string) Str::uuid();
        });
    }

    public function company() { return $this->belongsTo(Company::class, 'company_id'); }
    public function role() { return $this->belongsTo(Role::class, 'role_id'); }
    public function reports() { return $this->hasMany(Report::class, 'user_id'); }
    public function claims() { return $this->hasMany(Claim::class, 'user_id'); }
    public function histories() { return $this->hasMany(ItemHistory::class, 'actor_id'); }
}
