<?php

use App\Models\Agama;
use App\Models\Dusun;
use App\Models\GolonganDarah;
use App\Models\HubKepalaKeluarga;
use App\Models\JenisPekerjaan;
use App\Models\KartuKeluarga;
use App\Models\Paspor;
use App\Models\PendidikanAkhir;
use App\Models\RukunTetangga;
use App\Models\RukunWarga;
use App\Models\StatusHubKeluarga;
use App\Models\StatusPerkawinan;
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
        Schema::create('penduduk', function (Blueprint $table) {
            $table->string('nik');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['LAKI-LAKI','PEREMPUAN']);
            $table->string('alamat');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->foreignIdFor(GolonganDarah::class)->nullable();
            $table->foreignIdFor(KartuKeluarga::class);
            $table->foreignIdFor(Dusun::class)->nullable();
            $table->foreignIdFor(RukunWarga::class)->nullable();
            $table->foreignIdFor(RukunTetangga::class)->nullable();
            $table->foreignIdFor(JenisPekerjaan::class);
            $table->foreignIdFor(Agama::class);
            $table->foreignIdFor(StatusHubKeluarga::class);
            $table->foreignIdFor(PendidikanAkhir::class);
            $table->foreignIdFor(StatusPerkawinan::class);
            $table->foreignIdFor(HubKepalaKeluarga::class);
            $table->foreignIdFor(Paspor::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
