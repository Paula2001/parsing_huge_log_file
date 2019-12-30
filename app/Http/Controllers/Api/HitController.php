<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Hit;
use App\Libraries\BinaryTree;
use App\Http\Controllers\Controller;
class HitController extends Controller
{
    private $model ;

    public function __construct()
    {
        $this->model = new Hit();
    }


    public function getHits($offset ,$limit)
    {
        return $this->model->getHits($offset ,$limit);
    }
    public function getHitsInDescOrder($offset ,$limit){
        return $this->model->getTopHitsDesc($offset,$limit);
    }

}
