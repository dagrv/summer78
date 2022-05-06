<?php

namespace App\Models;

use App\Models\Variation;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model {
    use HasFactory;

    public $fillable = [
        'email',
        'subtotal',
        'placed_at',
        'packaged_at',
        'shipped_at'
    ];

    public $timestamps = [
        'placed_at',
        'packaged_at',
        'shipped_at'
    ];

    protected $casts = [
        'placed_at'     => 'datetime',
        'packaged_at'   => 'datetime',
        'shipped_at'    => 'datetime'
    ];

    public $statuses = [
        'placed_at',
        'packaged_at',
        'shipped_at'
    ];

    public static function booted() {
        static::creating(function (Order $order) {
            $order->placed_at = now();
            $order->uuid = (string) Str::uuid();
        });
    }

    public function status() {
        return collect($this->statuses)->last(fn($status) => filled($this->{$status}));
    }

    public function formattedSubtotal() {
        return money($this->subtotal);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function shippingType() {
        return $this->belongsTo(ShippingType::class);
    }

    public function shippingAddress() {
        return $this->belongsTo(ShippingAddress::class);
    }

    public function variations() {
        return $this->belongsToMany(Variation::class)
            ->withPivot(['quantity'])
            ->withTimestamps();
    }
}

// The most difficult thing is the decision to act. The rest is merely tenacity. The fears are paper tigers. You can do anything you decide to do. You can act to change and control your life and the procedure. The process is its own reward. 
// Pour Julie F.
// Merci pour tout