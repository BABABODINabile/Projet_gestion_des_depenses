<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['Revenu','Dépense']);
            $table->string('nom');
            $table->text('description');
            $table->timestamps();
        });
        Schema::table('categories',function(Blueprint $table){
            $table->foreignIdFor(\App\Models\User::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::dropIfExists('categories');
        Schema::table('categories',function(Blueprint $table){
            $table->dropForeignIdFor(\App\Models\User::class);
        });
    }
};
