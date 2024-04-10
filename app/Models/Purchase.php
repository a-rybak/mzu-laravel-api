<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'purchased_at' => 'datetime',
    ];

    protected $fillable = [
        'product_name',
        'quantity',
        'price',
        'purchased_at'
    ];

    public function getFormatedPurchaseDate()
    {
        return $this->purchased_at->format('jS F Y H:i');
    }

    public static function boot() {
        parent::boot();
        static::creating(function($model) {
            $dt = new \DateTime;
            $model->purchased_at = $dt->format('Y-m-d H:i:s');
            return true;
        });
    }
}
