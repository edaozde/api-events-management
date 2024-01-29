<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Event extends Model
{
    use HasFactory;

    //seuls ces elements peuvent etre mass-assingées
    protected $fillable = ['name', 'description', 'start_time', 'end_time', 'user_id'];


    //un évènement appartient à un utilisateur
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //un évènement a plusieurs participants

    public function attendees(): HasMany
    {
        return $this->hasMany(Attendee::class);

    }
}
