<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('doorprizes', function (Blueprint $table) {
            $table->integer('rank')->default(1)->after('id');
            $table->decimal('prize_amount', 15, 0)->default(0)->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('doorprizes', function (Blueprint $table) {
            $table->dropColumn(['rank', 'prize_amount']);
        });
    }
};
