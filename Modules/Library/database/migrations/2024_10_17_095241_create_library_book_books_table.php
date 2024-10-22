<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('library_book_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('language_id');
            $table->uuid()->default(Uuid::uuid7());
            $table->string('name', 25);
            $table->string('writer', 100);
            $table->string('publisher', 100);
            $table->string('isbn', 100);
            $table->string('publish_place', 100);
            $table->integer('publish_period');
            $table->year('publish_year');
            $table->string('internal_reference', 100);
            $table->string('type', 100);
            $table->text('synopsis');
            $table->string('cover_path', 200)->nullable();
            $table->string('book_path', 200)->nullable();
            $table->boolean('is_publish')->default(true);
            $table->integer('stock')->default(0);
            $table->decimal('rate', 5, 2)->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('library_book_categories')->onDelete('restrict');
            $table->foreign('language_id')->references('id')->on('base_languages')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library_book_books');
    }
};
