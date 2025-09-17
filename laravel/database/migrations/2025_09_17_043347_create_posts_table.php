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
        Schema::create('posts', function (Blueprint $table) {
    $table->uuid('post_id')->primary();
    $table->uuid('company_id');
    $table->string('post_name');
    $table->string('post_address');
    $table->integer('capacity');
    $table->timestamps();

    $table->foreign('company_id')->references('company_id')->on('companies');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
