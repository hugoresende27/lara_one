<?php

namespace App\Http\Controllers;

use App\Models\TextData;
use App\Repositories\TextDataRepository;
use App\Services\AppUrlService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use OpenAI;
use Phpml\Classification\KNearestNeighbors;

class HomeController extends Controller
{

    protected string $appUrl;
    private $textDataRepository;
    /**
     * __construct
     *
     * @param  mixed $appUrlService
     * @return void
     */
    public function __construct(AppUrlService $appUrlService,TextDataRepository $textDataRepository)
    {
        $this->appUrl =  $appUrlService->getAppUrl();
        $this->textDataRepository = $textDataRepository;
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
        $buttons = $this->textDataRepository->getAllButtons();
        return view('home', ['appUrl' => $this->appUrl, 'buttons' => $buttons]);
    }
    


    /**
     * dashboard
     *
     * @return View
     */
    public function dashboard()
    {
        $textData = $this->textDataRepository->getAll();

        return view ('dashboard', ['appUrl' => $this->appUrl, 'textData' => $textData]);
    }
}
