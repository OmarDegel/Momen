<?php

namespace App\Http\Controllers\Api;

use App\Enums\PageEnum;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Http\Resources\PageCollection;
use App\Http\Requests\Api\PageRequest;

class PageController extends MainController
{
    public function index(PageRequest $request)
    {
        $pages = Page::where('type', 'page')->filter($request)->paginate($this->perPage);
        $extra['page_types'] = PageEnum::getPagesTypes();
        return $this->sendDataCollection(new PageCollection($pages), __('site.pages'), $extra);
    }

    public function show($id)
    {
        $page = Page::active()->where('id', $id)->first();
        if (! $page) {
            return $this->messageError(__('api.page_not_found'));
        }
        return $this->sendData(new PageResource($page));
    }
}
