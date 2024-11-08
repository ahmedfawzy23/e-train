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
        Schema::create('settinges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo');
            $table->string('favicon');
            $table->string('city');
            $table->string('address');
            $table->string('work_hours');
            $table->text('map');
            $table->string('phone');
            $table->string('email');
            $table->string('fb');
            $table->string('twitter');
            $table->string('insta');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settinges');
    }
};
