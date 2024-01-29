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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('kind');
            $table->unsignedBigInteger('proxy_id')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('active_id');
            $table->double('remain', 20);
            $table->date('valid_until')->nullable();
            $table->double('cost_of_rent')->default(0);
            $table->double('cost_of_buyout')->default(0);
            $table->string('comment', 2048)->nullable();
            $table->decimal('initial', 18)->nullable();
            $table->string('citizenship')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('kind');
            $table->dropColumn('proxy_id');
            $table->dropColumn('owner_id');
            $table->dropColumn('branch_id');
            $table->dropColumn('client_id');
            $table->dropColumn('active_id');
            $table->dropColumn('remain');
            $table->dropColumn('valid_until');
            $table->dropColumn('cost_of_rent');
            $table->dropColumn('cost_of_buyout');
            $table->dropColumn('comment');
            $table->dropColumn('initial');
            $table->dropColumn('citizenship');
        });
    }
};
