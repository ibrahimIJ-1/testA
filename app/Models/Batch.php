<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_id',
        'BatchNumber',
        'Mmname',
        'terminal_id',
        'TotalAmount',
        'DateOfClosing',
        'DateOfCreating',
    ];

    public function terminal()
    {
        return $this->belongsTo(Terminal::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function summaryReport()
    {
        return $this->hasOne(SummaryReport::class);
    }
}
