<?php

namespace App\Http\Controllers;

use App\Models\TextData;
use App\Repositories\TextDataRepository;
use App\Services\AppUrlService;
use Exception;
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


    /**
     * cam
     *
     * @return View
     */
    public function cam()
    {
        $cam = 1;
        return view ('cam.index', ['appUrl' => $this->appUrl, 'cam' => $cam]);
    }


    public function storeImage(Request $request)
    {
        $fileName = '';
        try {
            $base64stringImage = $request->image;

            $folderPath = "webcam_upload/";
    
      
    
            $image_parts = explode(";base64,", $base64stringImage);
        
            $image_type_aux = explode("data:image/", $image_parts[0]);
    
        
            $image_type = $image_type_aux[1];
            
          
        
            $image_base64 = base64_decode($image_parts[1]);
        
            $fileName = uniqid() . '.'.$image_type;
        
          
        
            $file = $folderPath . $fileName;
        
            file_put_contents($file, $image_base64);
        } catch (Exception $e) {
            $fileName = $e->getMessage();
        }

    
        $gallery = [];//TODO model gallery with image paths
    
        return view('cam.gallery',['appUrl' => $this->appUrl, 'camUploadedFile' => $fileName, 'gallery' => $gallery] );
    }
}
