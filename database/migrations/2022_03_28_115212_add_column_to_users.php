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
        Schema::table('users', function (Blueprint $table) {

             $table->string('prenom')->after('nom');
            $table->unsignedBigInteger('code_apogée')->unique()->after('password');
            $table->unsignedBigInteger('num_tel')->after('code_apogée');
            $table->string('filiere')->after('num_tel');
            $table->string('role')->default('utilisateur')->after('filiere');
            $table->boolean('active')->default(1)->after('role');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
