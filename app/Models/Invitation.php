<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $table = 'invitations';

    protected $fillable = [
        'event_id', 'user_id','send_at','accepted_at','rejected_at'
    ];

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
