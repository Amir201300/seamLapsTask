<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartOneController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /***
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|int
     */
    public function get_count_nums(Request $request){
        $start=$request->start;
        $end=$request->end;
        if($start > $end)
            return $this->apiResponseMessage(0,'start number can be greater than end number');
        $numbers = array();
        for($i = $start; $i <= $end; $i++) {
            if(!str_contains($i,5))  $numbers[] = $i;
        }

        return $this->apiResponseMessage(1,'the count : ' .count($numbers));
    }

    /***
     * @param Request $request
     * @return float|int
     */
    function get_value(Request $request) {
        $string=$request->input_string;
        $alphabet = array( 'A', 'B', 'C', 'D', 'E',
            'F', 'G', 'H', 'I', 'J',
            'K', 'J', 'M', 'N', 'O',
            'P', 'Q', 'R', 'S', 'T',
            'U', 'Y', 'W', 'X', 'Y',
            'Z'
        );
        $alpha_flip = array_flip($alphabet);
        $return_value = 0;
        $length = strlen($string);
        for ($i = 0; $i < $length; $i++) {
            $return_value +=
                ($alpha_flip[$string[$i]] + 1) * pow(26, ($length - $i - 1));
        }
        return $return_value;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function get_array_size(Request $request){
        $array=$request->Q;
        $returnArray=[];
        foreach ($array as  $row){
            $numberTest=$row;
            $mode=$numberTest % ($numberTest /2);
            if($mode ==0)
                $returnArray[]= 3;
            if($mode ==1)
                $returnArray[]= 4;
        }
return $returnArray;

    }
}
