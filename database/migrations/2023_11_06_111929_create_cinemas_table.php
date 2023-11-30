<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cinemas', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("phone");
            $table->string("address")->unique();
            $table->boolean("capacity")->default(true);
            $table->foreignId("city_id")->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cinemas');
    }
};
