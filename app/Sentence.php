<?php

namespace App;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    protected $table = 'sentences';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sentence'
    ];


    /**
     * Get the words for the sentence.
     */
    public function sentence_words()
    {
        return $this->hasMany('App\Sentence_word');
    }
}
