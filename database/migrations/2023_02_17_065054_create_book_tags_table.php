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
        Schema::create('book_tags', function (Blueprint $table) {
            $table->id();
            $table->integer('book_id');
            $table->integer('tag_id');
            $table->integer('created_by')->nullable()->comment("ผู้สร้าง");
            $table->integer('updated_by')->nullable()->comment("ผู้แก้ไขล่าสุด");
            $table->integer('deleted_by')->nullable()->comment("ผู้ลบ");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_tags');
    }
};
