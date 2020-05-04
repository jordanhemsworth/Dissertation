<?php

namespace App;


trait Followable{


    public function follow(User $user){

        return $this->follows()->save($user);       //Save the user that is now being followed
    }

    public function unfollow(User $user){

        return $this->follows()->detach($user);       //Save the user that is now being followed
    }

    public function follows(){

        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');    //Check who the user follows, specify follows table and pivot keys
    }
    
    public function isFollowing(User $user){

        return $this->follows()->where('following_user_id', $user->id)->exists();       //Check to see if target is already being followed

    }

    public function toggleFollowing(User $user){

        if ($this->isFollowing($user)){
            return $this->unfollow($user);
        } 
            return $this->follow($user);
    }
}
?>