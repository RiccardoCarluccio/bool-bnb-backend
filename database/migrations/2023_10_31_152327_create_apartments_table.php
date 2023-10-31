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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("adress");
            $table->text("description");
            $table->tinyInteger("room");
            $table->tinyInteger("bad");
            $table->tinyInteger("bathroom");
            $table->integer("mq");
            $table->float("latitude");
            $table->float("longitude");
            $table->boolean("visibility")->deafault(true);
            $table->boolean("availability")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
