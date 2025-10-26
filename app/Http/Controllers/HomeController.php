<?php

namespace App\Http\Controllers;

use App\Exceptions\DatabaseOperationException;
use App\Services\DevotionService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class HomeController extends Controller
{

    public function __construct(private DevotionService $devotionService)
    {
    }

    public function index(Request $request): Response
    {
        try {
            $featuredDevotions = $this->devotionService->getAll(null, 3);

            return response()->view('home', ['featuredDevotions' => $featuredDevotions, 'error' => null]);
        } catch (Throwable $e) {
            if ($e instanceof DatabaseOperationException) {
                $this->log('error', $e, __FUNCTION__);
            } else {
                $this->log('error', $e, __FUNCTION__);
            }

            $request->session()->flash('app_error', 'Internal server error, please try again later.');

            return response()->view('home', ['featuredDevotions' => null]);
        }
    }
}
