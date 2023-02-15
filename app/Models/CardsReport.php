<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardsReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'summary_report_id',
        'TypeName',
        'PaymentTypeName',
        'SubTotalAmount',
        'SubTotalAmountFormatted',
        'SurchargeAmount',
        'SurchargeAmountFormatted',
        'TotalAmount',
        'TotalNumber',
    ];

    public function summeryReport()
    {
        return $this->belongsTo(SummaryReport::class);
    }
}
