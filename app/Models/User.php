<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function department()
    {
        return $this->belongsTo(Department::class, 'fk_department');
    }
    
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'fk_designation');
    }
}
