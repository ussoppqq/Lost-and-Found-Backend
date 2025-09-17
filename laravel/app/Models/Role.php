<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'role_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['role_code', 'role_name'];

    protected static function booted()
    {
        static::creating(function ($role) {
            $role->role_id = (string) Str::uuid();
        });
    }

    public function users() { return $this->hasMany(User::class, 'role_id'); }
}
