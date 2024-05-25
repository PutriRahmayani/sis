<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('nama');
            $table->date('tanggal');
            // $table->string('prestasi');
            $table->string('lomba');
            $table->string('penyelenggara');
            $table->string('tingkat');
            $table->string('keterangan');
            $table->string('bukti');
            $table->enum('status', ['menunggu konfirmasi', 'disetujui'])->default('menunggu konfirmasi');
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
        Schema::dropIfExists('prestasi');
    }
}
