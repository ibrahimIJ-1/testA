<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('batch_id')->constrained('batches')->onUpdate('cascade')->onDelete('cascade');
            $table->text('merchant')->nullable();
            $table->text('location')->nullable();
            $table->text('app_config_name')->nullable();
            $table->text('tpn')->nullable();
            $table->text('report_type')->nullable();
            $table->timestamp('open_date')->nullable();
            $table->text('batch_number')->nullable();
            $table->text('batch_idt')->nullable();
            $table->timestamp('close_date')->nullable();
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
        Schema::dropIfExists('summary_reports');
    }
};
