<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SummaryReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_id',
        'merchant',
        'location',
        'app_config_name',
        'tpn',
        'report_type',
        'open_date',
        'batch_number',
        'batch_idt',
        'close_date',
    ];

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function cardsReports()
    {
        return $this->hasMany(CardsReport::class);
    }
}
