<?php

namespace App\Http\Controllers;

use App\Services\AppUrlService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use OpenAI;
use Phpml\Classification\KNearestNeighbors;

class HomeController extends Controller
{

    protected string $appUrl;
    
    /**
     * __construct
     *
     * @param  mixed $appUrlService
     * @return void
     */
    public function __construct(AppUrlService $appUrlService)
    {
        $this->appUrl =  $appUrlService->getAppUrl();
    }


    
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

    
    /**
     * home
     *
     * @return View
     */
    public function home()
    {
        return view('home', ['appUrl' => $this->appUrl]);
    }
    


    /**
     * dashboard
     *
     * @return View
     */
    public function dashboard()
    {
        return view ('dashboard');
    }
}
