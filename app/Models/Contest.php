<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    use HasFactory;
    protected $table = 'contests';

        protected $fillable = [ 'title', 'image','question', 'answer_1', 'answer_2', 'answer_3','answer_4',
        'correct_answer','start_time','end_time','status','suggested_competitions'];

    public function results()
    {
        return $this->hasMany(Results::class, 'contest_id', 'id');
    }
}
