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

        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('restaurant_id')->unsigned(); // Foreign Key
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->string('name');
            $table->string('menu_description');
            $table->decimal('price', 8, 2); // Example: 8 total digits, 2 after the decimal point
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
