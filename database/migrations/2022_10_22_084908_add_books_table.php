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
            $table->string('image')->nullable();
            $table->string('isbn', 255);
            $table->string('category', 255);
            // $table->string('author', 255);
            // $table->foreign('category_id')->unsigned()->nullable()->nullOnDelete();
            $table->integer('author_id')->unsigned()->references('id')->on('authors')->nullOnDelete();
            $table->string('total_books', 255)->nullable();
            $table->string('book_source', 255);
            $table->string('racks', 255);
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