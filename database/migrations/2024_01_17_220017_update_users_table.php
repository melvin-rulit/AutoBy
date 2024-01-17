<?php

use App\Models\Branch;
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('birthday')->nullable();
            $table->string('passport_series')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('passport_notes')->nullable();
            $table->string('registration_address')->nullable();
            $table->string('phone_number', 32)->nullable();
            $table->string('comment', 1024)->nullable();
            $table->integer('role_id')->default(0);
            $table->foreignIdFor(Branch::class)->nullable();
            $table->boolean('enabled')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table){
            $table->string('name');
            $table->dropColumn('first_name');
            $table->dropColumn('middle_name');
            $table->dropColumn('last_name');
            $table->dropColumn('birthday');
            $table->dropColumn('passport_series');
            $table->dropColumn('passport_number');
            $table->dropColumn('passport_notes');
            $table->dropColumn('registration_address');
            $table->dropColumn('phone_number');
            $table->dropColumn('comment');
            $table->dropColumn('role_id');
            $table->dropColumn('branch_id');
            $table->dropColumn('enabled');
        });
    }
};
