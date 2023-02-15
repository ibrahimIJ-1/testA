<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchant_name',
        'terminal_id'
    ];

    public function batches()
    {
        return $this->hasMany(Batch::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
