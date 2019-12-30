<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Visitor;
class VisitorController extends Controller
{
    private $model ;
    public function __construct()
    {
        $this->model = new Visitor();
    }

    /**
     * @param int $offset
     * @param int $limit
     * @return array
     */
    public function uniqueVisitorsJson($offset ,$limit)
    {
        return  $this->model->getUniqueVisitors($offset,$limit);
    }

}
