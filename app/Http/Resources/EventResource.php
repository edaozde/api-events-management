<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * on gère comment les objets Event doivent être transformés en réponses JSON. 
     * toArray = Cette méthode est responsable de transformer l'objet Event représenté par cette ressource en un tableau associatif qui sera ensuite converti en réponse JSON.

     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        //retourne un tableau associatif qui définit comment 
        //les propriétés de l'objet Event doivent être présentées dans la réponse JSON.
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,

            //ajout de user associé à l'event
            'user' => new UserResource($this->whenLoaded('user')),

            //ajout des participants associés à l'event

            'attendee' => AttendeeResource::collection(
                $this->whenLoaded('attendees')
            )
        ];
// $this->whenLoaded vérifie si la relation 'user' est chargée avant de l'inclure, ce qui évite d'inclure des données non nécessaires.

        }
}
