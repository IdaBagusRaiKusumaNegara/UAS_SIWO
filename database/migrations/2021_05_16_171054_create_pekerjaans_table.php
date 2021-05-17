<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePekerjaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_Customer', 100);
            $table->string('Nomor_HP', 12);
            $table->bigInteger('unit_kerja_id');
            $table->enum('Kategori_Pekerjaan', ['Software','Hardware','Jaringan']);
            $table->text('Deskripsi_Pekerjaan');
            $table->enum('Status_Pekerjaan', ['Pending','Process','Completed']);
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
        Schema::dropIfExists('pekerjaans');
    }
}
