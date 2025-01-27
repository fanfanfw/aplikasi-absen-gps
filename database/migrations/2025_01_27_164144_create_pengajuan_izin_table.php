<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanIzinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_izin', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->char('nik', 5)->nullable(); // Kolom NIK dengan panjang 5 karakter
            $table->date('tgl_izin')->nullable(); // Kolom tanggal izin
            $table->char('status', 1)->nullable()->comment('i: izin, s: sakit'); // Status (izin atau sakit)
            $table->string('keterangan', 255)->nullable(); // Keterangan tambahan
            $table->char('status_approved', 1)->default('0')->nullable()->comment('0: Pending, 1: Disetujui, 2: Ditolak'); // Status persetujuan
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_izin');
    }
}
