<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class ItemHistory extends Model
{
    use HasFactory;

    protected $table = 'item_histories';
    protected $primaryKey = 'history_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'company_id','item_id','event_type','item_status','actor_id',
        'report_id','claim_id','post_id','notes','occurred_at'
    ];

    protected static function booted()
    {
        static::creating(function ($history) {
            $history->history_id = (string) Str::uuid();
        });
    }

    public function company() { return $this->belongsTo(Company::class, 'company_id'); }
    public function item() { return $this->belongsTo(Item::class, 'item_id'); }
    public function actor() { return $this->belongsTo(User::class, 'actor_id'); }
    public function claim() { return $this->belongsTo(Claim::class, 'claim_id'); }
    public function post() { return $this->belongsTo(Post::class, 'post_id'); }
}
