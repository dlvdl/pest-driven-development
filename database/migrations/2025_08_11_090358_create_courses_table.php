<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('tagline');
            $table->string('image_name')->nullable();
            $table->json('learnings')->nullable();
            $table->string('title');
            $table->text('description');
            $table->timestamp('released_at')->nullable();
            $table->string('paddle_product_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
