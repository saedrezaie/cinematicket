<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique()->index();
            $table->bigInteger("price");
            $table->integer("time");
            $table->foreignId("user_id")->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("section_id")->constrained('sections')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer("salon");
            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
