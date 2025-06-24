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
       Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('game_title');
            $table->longText('game_description');
            $table->string('game_image')->nullable();
            $table->unsignedTinyInteger('game_rating'); // 1-10
            $table->string('game_status'); // exemplo: "Publicado", "Rascunho"
            $table->unsignedBigInteger('category_id');
            $table->integer('review_likes')->default(0);
            $table->integer('game_duration')->nullable(); // em minutos
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
