<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(Request $request)
    {
        $home_page = HomePage::first();
        if ($home_page) {
            $home_page->banners = $home_page->getBanners();
            $home_page->service_items = $home_page->getServiceItems();
            $home_page->service_steps = $home_page->getServiceSteps();
            $home_page->brief = $home_page->getBrief();
            $home_page->examples = $home_page->getExamples();
            $home_page->case_bg = $home_page->getCaseBg();
        }
        
        return response()->json($home_page);
        
    }
}
