<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('participants', function (Blueprint $table) {
            // Drop old unused columns
            $table->dropColumn(['email', 'phone', 'city', 'country', 'portfolio_url', 'description']);

            // Add new columns
            $table->integer('age')->after('name');
            $table->string('gender')->after('age');
            $table->string('shirt_size')->after('gender');
            $table->string('instagram')->after('shirt_size');
            $table->string('telegram')->after('instagram');
            $table->text('address')->after('telegram');
            $table->string('denim_brand')->after('category_id');
            $table->string('denim_cut')->after('denim_brand');
            $table->string('denim_weight')->after('denim_cut');
            $table->string('photo_front')->after('denim_weight');
            $table->string('photo_back')->after('photo_front');
            $table->string('payment_proof')->after('photo_back');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->text('description')->nullable();

            $table->dropColumn([
                'age',
                'gender',
                'shirt_size',
                'instagram',
                'telegram',
                'address',
                'denim_brand',
                'denim_cut',
                'denim_weight',
                'photo_front',
                'photo_back',
                'payment_proof'
            ]);
        });
    }
};
