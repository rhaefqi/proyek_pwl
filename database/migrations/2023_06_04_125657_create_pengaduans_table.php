<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('judul_laporan');
            $table->foreignId("penduduk_id")->constrained("users")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->text('content_laporan');
            $table->string('lokasi');
            $table->foreignId("category_id")->constrained("categories")->onUpdate("CASCADE")->onDelete("CASCADE");
            $table->string('gambar')->nullable();
            $table->boolean('role')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('pengaduans');
    }
};
