<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bureaus', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('filiere'); 
            $table->unsignedBigInteger('Tel')->unique();
            $table->date('date_mandat');
            $table->string('Poste');
            $table->string('image') ; 
            $table->foreignId('association_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['Poste','association_id','email']);
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
        Schema::dropIfExists('bureaus');
    }
};
