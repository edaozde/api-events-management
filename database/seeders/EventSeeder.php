<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;




class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //récupération de tous les utilisateurs
        $users= User::all();

        //boucle pour créer des events fictifs, chaque itération, on choisi un user random parmi ceux 
        //recup au dessus et on appelle la factoryEvent pour lui associé un event à ce user
        for($i = 0; $i < 200; $i++) {
            $user = $users->random();
            \App\Models\Event::factory()->create([
                'user_id' => $user->id
            ]);
       }
    }
}
