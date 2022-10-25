<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->longtext('description');
            $table->string('image', 255)->nullable();
            $table->string('isbn', 255)->nullable();
            $table->string('category_id', 255)->nullable();
            $table->string('author_id', 255)->nullable();
            $table->string('total_books', 255)->nullable();
            $table->string('book_source_id', 255)->nullable();
            $table->string('rack_id', 255)->nullable();
            $table->string('tags')->nullable();
            $table->string('visibility', 255)->nullable();
            $table->dateTime('published_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('books');
    }
};