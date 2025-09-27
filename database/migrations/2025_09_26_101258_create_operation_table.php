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
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->double('montant');
            $table->longText('description');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operations');
        Schema::table('operations',function(Blueprint $table){
            $table->dropForeignIdFor(\App\Models\User::class);
        });
        Schema::table('operations',function(Blueprint $table){
            $table->dropForeignIdFor(\App\Models\Category::class);
        });
    }
};
