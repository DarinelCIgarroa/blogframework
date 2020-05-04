<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();

            $table->mediumText('excerpt')->nullable();
            $table->text('body');
            $table->enum('status', ['PUBLISHED','DRAFT'])->default('DRAFT');

            $table->string('file')->nullable();

            $table->foreignId('user_id')
            ->constrained()
            ->cascadeOnDelate();

            $table->foreignId('category_id')
            ->constrained()
            ->cascadeOnDelate();

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
        Schema::dropIfExists('posts');
    }
}
