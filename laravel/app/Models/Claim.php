<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Claim extends Model
{
    use HasFactory;

    protected $table = 'claims';
    protected $primaryKey = 'claim_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['company_id','user_id','item_id','claim_status','pickup_schedule'];

    protected static function booted()
    {
        static::creating(function ($claim) {
            $claim->claim_id = (string) Str::uuid();
        });
    }

    public function company() { return $this->belongsTo(Company::class, 'company_id'); }
    public function user() { return $this->belongsTo(User::class, 'user_id'); }
    public function item() { return $this->belongsTo(Item::class, 'item_id'); }
}
