<?php

use App\Models\Branch;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('birthday')->nullable();
            $table->string('email');
            $table->string('passport_series')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('passport_notes')->nullable();
            $table->string('registration_address')->nullable();
            $table->string('residence_address');
            $table->string('resident_card')->nullable();
            $table->string('personnel_number')->nullable();
            $table->string('phone_number', 32)->nullable();
            $table->string('comment', 1024)->nullable();
            $table->foreignIdFor(Branch::class)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', static function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('middle_name');
            $table->dropColumn('last_name');
            $table->dropColumn('birthday');
            $table->dropColumn('email');
            $table->dropColumn('passport_series');
            $table->dropColumn('passport_number');
            $table->dropColumn('passport_notes');
            $table->dropColumn('registration_address');
            $table->dropColumn('residence_address');
            $table->dropColumn('resident_card');
            $table->dropColumn('personnel_number');
            $table->dropColumn('phone_number');
            $table->dropColumn('comment');
            $table->dropSoftDeletes();
        });
    }
};
