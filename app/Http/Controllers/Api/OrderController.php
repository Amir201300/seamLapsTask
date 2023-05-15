<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use App\Http\Resources\OrderResource;
use App\Repo\OrderRepo;
use App\Models\Menu;
use Illuminate\Http\Request;
use Validator;

class OrderController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function menu(){
        $menu=Menu::all();
        return $this->apiResponseData(MenuResource::collection($menu));
    }

    /***
     * @param Request $request
     * @param OrderRepo $orderRepo
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function make_order(Request $request, OrderRepo $orderRepo)
    {
        $validate_order = $this->validate_order($request);
        if (isset($validate_order))
            return $validate_order;
      $order = $orderRepo->save_order($request);
      return $this->apiResponseData(new OrderResource($order),'success');
    }

    /***
     * @param $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    private function validate_order($request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'menu' => 'required|array',
            "menu.*" => "required|exists:menus,id",
            'customer_name' => $request->type == 2 ? 'required' : '',
            'customer_phone' => $request->type == 2 ? 'required' : '',
        ]);

        if ($validator->fails()) {
            return $this->apiResponseMessage(0, $validator->messages()->first(), 400);
        }
    }

}
