<?php

namespace App\Http\Controllers;

use App\Models\TextData;
use App\Services\AppUrlService;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
class TextDataController extends Controller
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


    /**
     * index
     *
     * @return View
     */
    public function index()
    {
        $textData = TextData::all();
        $appUrl = $this->appUrl;
        return view('textdata.index', compact('textData', 'appUrl'));
    }
}
