<?php

namespace App\Http\Controllers;

use A17\Twill\Facades\TwillAppSettings;
use App\Repositories\PageRepository;
use Illuminate\Contracts\View\View;

class PageDisplayController extends Controller
{
    public function show(string $slug, PageRepository $pageRepository): View
    {
        $page = $pageRepository->forSlug($slug);

        if (!$page) {
            abort(404);
        }

        return view('site.page', ['item' => $page]);
    }

    public function home(): View
    {
      //  if (TwillAppSettings::get('homepage.homepage.page')->isNotEmpty()) {
            /** @var \App\Models\Page $frontPage */
            $frontPage = cache()->remember("frontPage", 3600, function (){
               return TwillAppSettings::get('homepage.homepage.page')->first();
            });

            if (isset($frontPage->published) && $frontPage->published) {
                return view('site.page', ['item' => $frontPage]);
            }
        //}

        abort(404);
    }
}
