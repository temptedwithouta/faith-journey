<?php

namespace App\Http\Controllers;

use App\Exceptions\DatabaseOperationException;
use App\Http\Requests\IndexDevotionRequest;
use App\Services\CategoryService;
use App\Services\DevotionService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class DevotionController extends Controller
{

    public function __construct(private DevotionService $devotionService, private CategoryService $categoryService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(IndexDevotionRequest $request): Response
    {
        try {
            $categories = $this->categoryService->getAll();

            $devotions = $this->devotionService->getAll($request);

            $featuredDevotion = $this->devotionService->getAll(null, 1);

            return response()->view('devotion', [
                'categories' => $categories,
                'devotions' => $devotions,
                'featuredDevotion' => $featuredDevotion->isEmpty() ? null : $featuredDevotion->first(),
            ]);
        } catch (Throwable $e) {
            if ($e instanceof DatabaseOperationException) {
                $this->log('error', $e, __FUNCTION__);
            } else {
                $this->log('error', $e, __FUNCTION__);
            }

            $request->session()->flash('app_error', 'Internal server error, please try again later.');

            return response()->view('devotion', [
                'categories' => null,
                'devotions' => null,
                'featuredDevotion' => null
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**searc
     * Display the specified resource.
     */
    public function show(Request $request, string $id): Response
    {
        try {
            $devotion = $this->devotionService->getById((int) $id);

            $relatedDevotions = $this->devotionService->getAll(null, 3, (int) $id);

            return response()->view('devotion-detail', ['devotion' => $devotion, 'relatedDevotions' => $relatedDevotions]);
        } catch (Throwable $e) {
            if ($e instanceof DatabaseOperationException) {
                $this->log('error', $e, __FUNCTION__);
            } else {
                $this->log('error', $e, __FUNCTION__);
            }

            $request->session()->flash('app_error', 'Internal server error, please try again later.');

            return response()->view('devotion-detail', ['devotion' => null, 'relatedDevotions' => null]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
