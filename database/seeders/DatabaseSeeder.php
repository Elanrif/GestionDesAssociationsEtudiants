<?php

namespace Database\Seeders;

use App\Models\Association;
use App\Models\CodeEtudiant;
use App\Models\User;
use Database\Factories\CodeEtudiantFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory()->count(50)->create() ;
        Association::factory()->count(5)->create() ; 
    }
}
