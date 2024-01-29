<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Récupération des utilisateurs et des événements 
        $users = \App\Models\User::all();
        $events= \App\Models\Event::all();

        //parcours de tous les users et pour chaque user choisit 1 à 3 random events
        foreach ($users as $user) {
            $eventsToAttend = $events->random(rand(1, 3));

            //parcours des events choisis et création d'un nouvel enregistrement attendee dans la table qui associe user à event
            foreach ($eventsToAttend as $event) {
                \App\Models\Attendee::create([
                    'user_id' => $user->id,
                    'event_id' => $event->id,
                ]);
            }

          
        }
    }
}
