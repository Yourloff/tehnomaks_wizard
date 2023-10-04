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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('surname')->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->date('date_of_birth')->nullable(false);
            $table->string('gender')->nullable(false);
            $table->string('phone')->nullable(false);
            $table->string('city')->nullable();
            $table->string('email')->nullable(false);
            $table->integer('rating')->unsigned()->default(0);
            $table->text('options')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
