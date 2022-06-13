<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pendaftaranonline extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'pendaftaran_online';
    protected $primaryKey = 'no_pendaftaran';
    protected $guarded = [];
    public $incrementing = false;
    protected $hidden = [
        'password', 'remember_token',
    ];
}
