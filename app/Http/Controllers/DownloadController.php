<?php

namespace App\Http\Controllers;

use App\Models\DownloadCount;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        return view('frontend.pages.download.index');
    }

    /**
     * Get current download count
     */
    public function getCount()
    {
        $count = DownloadCount::getCount();
        return response()->json([
            'success' => true,
            'count' => $count,
        ]);
    }

    /**
     * Increment download count
     */
    public function incrementCount(Request $request)
    {
        $count = DownloadCount::incrementCount();
        return response()->json([
            'success' => true,
            'count' => $count,
        ]);
    }
}

