<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {

        
        Schema::table('pendataans',function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('Users')
            ->onUpdate('cascade')->onDelete('cascade');            
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
   
        
        Schema::table('pendataans', function(Blueprint $table) {
            $table->dropForeign('pendataan_user_id_foreign');
        });
        Schema::table('pendataans', function(Blueprint $table) {
            $table->dropIndex('pendataan_user_id_foreign');
        });



        Schema::dropIfExists('pendataans');
        
    }
};

