<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;
use Phpml\Classification\KNearestNeighbors;

class HomeController extends Controller
{
    public function indexAI()
    {

        $client = OpenAI::client(env('CHAT_GPT_API_KEY'));

        /*
        $result = $client->completions()->create([
            'model' => 'davinci-002',
            'prompt' => 'PHP is',
        ]);
        */
        $data = json_decode('{
                                "model": "tts-1",
                                "input": "The quick brown fox jumped over the lazy dog.",
                                "voice": "alloy"
                            }',true);
        //dd($data);
        $result = $client->audio()->speech($data);

        dd($result);

        return view("home");
    }


    public function home()
    {
        return view ('home');
    }
}
