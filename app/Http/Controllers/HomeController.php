<?php

namespace App\Http\Controllers;

use App\Sentence;
use App\Sentence_word;

class HomeController extends Controller
{
    public function index()
    {
        $sentences = Sentence::all();

        return view('welcome', [
            'sentences' => $sentences
        ]);

    }

    public function getSentenceWordById()
    {
        $sentenceId = \request()->request->get('sentenceId');
        return
            Sentence_word::where('sentence_id', (int)$sentenceId)->get();
    }

}
