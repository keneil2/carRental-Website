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
        Schema::create("customers",function(Blueprint $table){
       $table->id();
       $table->string("userName");
       $table->string("email")->unique();
       $table->string("pwd");
       $table->timestamp("added_at")->useCurrent();
       $table->timestamp("updated_at")->nullable();
        });
        
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->renameColumn('added_at', 'created_at');
        });
        //
    }
};
