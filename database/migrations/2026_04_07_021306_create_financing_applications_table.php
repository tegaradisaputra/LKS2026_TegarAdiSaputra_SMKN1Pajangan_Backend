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
        Schema::create('financing_applications', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('business_verifications_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();

            $table->bigInteger('jumlah_pembiayaan');
            $table->integer('tenor_bulan');
            $table->string('tujuan_pembiayaan');
            $table->integer('skor_kelayakan')->nullable();
            $table->bigInteger('rekomendasi_limit')->nullable();
            $table->string('catatan_analisis')->nullable();
            $table->enum('status', ['submitted', 'under_review', 'recommended', 'rejected_by_analyst', 'approved', 'rejected_by_manager'])->nullable();
            $table->timestamp('submitted_at');
            $table->timestamp('approved_at')->nullable();
            $table->string('rejected_reason')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financing_applications');
    }
};
