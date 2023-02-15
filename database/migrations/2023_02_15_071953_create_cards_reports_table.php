<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Ramsey\Uuid\v1;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('summary_report_id')->constrained('summary_reports')->onUpdate('cascade')->onDelete('cascade');
            $table->text('TypeName')->nullable();
            $table->text('PaymentTypeName')->nullable();
            $table->text('SubTotalAmount')->nullable();
            $table->text('SubTotalAmountFormatted')->nullable();
            $table->text('SurchargeAmount')->nullable();
            $table->text('SurchargeAmountFormatted')->nullable();
            $table->text('TotalAmount')->nullable();
            $table->text('TotalNumber')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards_reports');
    }
};
