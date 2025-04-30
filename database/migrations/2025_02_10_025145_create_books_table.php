<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_code')->unique();
            $table->string('judul');
            $table->string('pengarang');
            $table->string('penerbit')->unique();
            $table->year('year');
            $table->enum('status', ['available', 'borrowed', 'maintenance']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
