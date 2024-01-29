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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->unsignedBigInteger('deal_id');
            $table->double('amount', 20);
            $table->double('rent', 20, 2)->default(0);
            $table->double('buyout', 20, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('deal_id');
            $table->dropColumn('amount');
            $table->dropColumn('rent');
            $table->dropColumn('buyout');
        });
    }
};
