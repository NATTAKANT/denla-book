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
        Schema::table('books', function (Blueprint $table) {
            $table->renameColumn('isbn_1', 'call_number')->comment("เลขมาตราฐานสากล")->change();
            $table->renameColumn('isbn_2', 'ISBN')->comment("เลขมาตราฐานสากล")->change();
            $table->renameColumn('isbn_3', 'ISSN')->comment("เลขมาตราฐานสากล")->change();
            $table->after('isbn_3', function (Blueprint $table) {
                $table->string('DOI')->comment("เลขมาตราฐานสากล")->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('DOI');
        });
    }
};
