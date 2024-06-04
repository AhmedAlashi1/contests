<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;

    protected $table = 'results';

        protected $fillable = [ 'contest_id', 'user_name','answer'];

    public function contest()
    {
        return $this->belongsTo(Contest::class,'contest_id','id');
    }
}
