<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * UTIISATEURS.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usercontacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('message',255) ;
            $table->integer('status')->default(0)->nullable() ; //  0 pas lu par l'admin et 1 lu par l'admin  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usercontacts');
    }
};
