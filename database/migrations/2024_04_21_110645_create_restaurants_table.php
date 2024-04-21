<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('users'); // Corrected table name
            $table->string('restaurant_name');
            $table->string('description');
            $table->string('address');
            $table->string('preparation_time');
            $table->string('cuisine');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
