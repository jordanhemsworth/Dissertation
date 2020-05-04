<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\QuestionController;
use App\User;

class Question extends Model
{
    protected $guarded =[];     //Nothing is guarded

    public function user(){
        return $this->belongsTo(User::class);
    }
}
