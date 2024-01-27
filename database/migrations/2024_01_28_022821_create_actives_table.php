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
        Schema::create('actives', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('body_number');
            $table->string('reg_number');
            $table->integer('year');
            $table->integer('color_id');
            $table->decimal('cost', 15);
            $table->integer('investor_id');
            $table->integer('branch_id');
            $table->date('osago');
            $table->double('cost_of_rent')->default(0);
            $table->double('cost_of_buyout')->default(0);
            $table->string('osago_number')->default('');
            $table->string('document_series');
            $table->string('document_number');
            $table->date('document_date');
            $table->string('document_notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('actives', function (Blueprint $table) {
            $table->dropColumn('model');
            $table->dropColumn('body_number');
            $table->dropColumn('reg_number');
            $table->dropColumn('year');
            $table->dropColumn('color_id');
            $table->dropColumn('cost', 15);
            $table->dropColumn('investor_id');
            $table->dropColumn('branch_id');
            $table->dropColumn('osago');
            $table->dropColumn('cost_of_rent');
            $table->dropColumn('cost_of_buyout');
            $table->dropColumn('osago_number');
            $table->dropColumn('document_series');
            $table->dropColumn('document_number');
            $table->dropColumn('document_date');
            $table->dropColumn('document_notes');
        });
    }
};
