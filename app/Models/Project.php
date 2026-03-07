<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Project extends Model
{
    use Notifiable;

    protected $table = 'project';

    protected $fillable = [
        'foto',
        'nama_project',
        'link',
    ];
}
