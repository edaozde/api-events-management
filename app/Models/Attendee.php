<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Attendee extends Model
{
    use HasFactory;

    //un participant appartient à un utilisateur

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    //un participant appartient à un évènement

    public function event(): BelongsTo 
    {
        return $this->belongsTo(Event::class);
    }
}
