<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->text('batch_id')->unique();
            $table->bigInteger('BatchNumber');
            $table->text('Mmname')->nullable();
            $table->foreignId('terminal_id')->constrained('terminals')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('TotalAmount');
            $table->timestamp('DateOfClosing')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('DateOfCreating')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('batches');
    }
};
