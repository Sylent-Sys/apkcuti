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
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class,'created_by')->constrained('users')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\User::class,'review_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->date("tanggal_mulai");
            $table->date("tanggal_selesai");
            $table->string("alasan");
            $table->string("lampiran");
            $table->integer("status")->default(0)->comment("0: pending, 1: disetujui, 2: ditolak");
            $table->string("catatan")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutis');
    }
};
