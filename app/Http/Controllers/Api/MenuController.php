<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuCollection;
use App\Http\Resources\MenuResource;
use App\Models\Menu;
use Illuminate\Http\Request;
use Validator;

class MenuController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function menu(){
        $menu=Menu::paginate(10);
        return $this->apiResponseData(new MenuCollection($menu),'success');
    }
}
