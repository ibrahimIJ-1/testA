<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'batch_id',
        'terminal_id',
    ];

    public function terminal()
    {
        return $this->belongsTo(Terminal::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
