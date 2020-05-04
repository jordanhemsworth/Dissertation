<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Question;
use App\User;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute(){
        return "https://api.adorable.io/avatars/120/abott@adorable.png" . $this->email;
    }

    public function timeline(){

        $friends = $this->follows()->pluck('id');         //Retreive user ids through relationship
        $friends->push($this->id);                      //Push the users own ID into collection

        return Question::whereIn('user_id', $friends)
            ->latest()->get();;      //Retrieve all Questions from collection when it contains own users ID in desc order
    }

    public function questions(){

        return $this->hasMany(Question::class)->latest();
    }
    
    public function profilePath($append = ''){

        $path = route('profile', $this->name);           //Saves the path to profile in variable

        return $append ? "{$path}/{$append}" : $path;       //Append the path if needed, if not return usual path
    }


    public  function getRouteKeyName(){

        return 'name';                      //Name of the attribute to be used for route model binding rather than auto using the primary ID
    }

}
