<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;

    protected $table = 'results';


        protected $fillable = [ 'contest_id', 'user_name','answer'];
    protected $appends=['correct_answers'];

    public function getCorrectAnswersAttribute()
    {
        return $this->answer == $this->contest->correct_answer ? 1 :0 ;
    }

    public function contest()
    {
        return $this->belongsTo(Contest::class,'contest_id','id');
    }
}
