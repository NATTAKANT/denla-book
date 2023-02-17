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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->integer('location_id')->comment("ตำแหน่งหนังสือในชั้น");
            $table->integer('material_id')->comment("ประเภทชิ้นงาน('หนังสือ' ,'ซีดีเสียง')");
            $table->integer('collection_id')->comment("กลุ่มหนังสือสำหรับจำนวนวันยืมและ คิดค่าล่วงเวลา ");
            $table->string('isbn_1')->nullable()->comment("เลขมาตรฐานสากลประจำหนังสือ ชุด 1");
            $table->string('isbn_2')->nullable()->comment("เลขมาตรฐานสากลประจำหนังสือ ชุด 2");
            $table->string('isbn_3')->nullable()->comment("เลขมาตรฐานสากลประจำหนังสือ ชุด 3");
            $table->string('title')->comment("ชื่อหนังสือหลัก");
            $table->string('title_another')->nullable()->comment("ชื่อหนังสืออื่น ๆ");
            $table->string('author')->comment("ผู้แต่ง");
            $table->string('author_co')->nullable()->comment("ผู้ช่วยผู้แต่ง");
            $table->string('responsibility')->nullable()->comment("ผู้รับผิดชอบ");
            $table->string('publisher')->nullable()->comment("สำนักพิมพ์");
            $table->integer('page')->nullable()->comment("จำนวนหน้า");
            $table->string('synopsis')->nullable()->comment("เรื่องย่อ");
            $table->integer('book_count')->nullable()->default('0')->comment("จำนวนการยืมหนังสือ");
            $table->enum('status', ['active', 'inactive'])->default('active')->comment("สถานะการเผยแพร่");
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
        Schema::dropIfExists('books');
    }
};
