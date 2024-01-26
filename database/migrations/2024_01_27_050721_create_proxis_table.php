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
        Schema::create('proxis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('delegate_id');
            $table->unsignedBigInteger('owner_id');
            $table->foreign('delegate_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('number');
            $table->datetime('valid_until');
            $table->string('issued_by');
            $table->date('issued_date')->nullable();
            $table->string('issued_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proxies', function (Blueprint $table) {
            $table->dropColumn('delegate_id');
            $table->dropColumn('owner_id');
            $table->dropColumn('number');
            $table->dropColumn('valid_until');
            $table->dropColumn('issued_by');
            $table->dropColumn('issued_number');
        });
    }
};
