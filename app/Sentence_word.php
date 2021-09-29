<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentence_word extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'word', 'delay', 'sentence_id', 'order'
    ];

    /**
     *
     */
    public function sentence()
    {
        return $this->belongsTo('App\Sentence');
    }
}
