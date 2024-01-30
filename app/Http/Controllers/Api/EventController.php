<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use Illuminate\Http\Request;
use App\Models\Event;



class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //récupérer tous les events

        //  return EventResource::collection(Event::all());

        //récupérer tous les événements (Event) avec les détails de 
        //l'utilisateur associé, puis utilise une collection de ressources 
        //(EventResource::collection) pour transformer ces objets Event en une réponse JSON.


         return EventResource::collection(Event::with('user')->paginate());

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //stocker un nouvel event dans la BdD
        
        $event = Event::create([
            ...$request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'start_time' => 'required|date',
                'end_time' => 'required|date|after:start_time',

            ]),
            'user_id' => 1
        ]);
        // return $event;
        return new EventResource($event);

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //retourner un event avec l'user associé
        $event->load('user', 'attendees');
        return new EventResource($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $event->update(
            $request->validate([
                'name' => 'sometimes|string|max:255',
                'description' => 'nullable|string',
                'start_time' => 'sometimes|date',
                'end_time' => 'sometimes|date|after:start_time'
            ])
            );
            return new EventResource($event);
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
      $event->delete();

    //   return response()->json([
    //     'message' => 'Event deleted successfully'
     // ]);

     return response(status: 204);
    }
}
