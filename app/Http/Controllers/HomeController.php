<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\HashTable;
class HomeController extends Controller
{
    private $array = [];
    private $hash ;
    public function __construct()
    {
        $this->hash = new HashTable();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = 1000000;
        $fn = fopen(asset('NASA_access_log_Jul95'),"r");
        for($i = 0;$i < $limit;$i++){
            $result = fgets($fn);
            preg_match('/.+?(?=- -)/', $result,$match);
            if(isset($match[0])){
                if(isset($this->array[$this->hash->hashString($match[0] ,$limit)])){
                    continue;
                }
                $this->array[$this->hash->hashString('dialup21.afn.org ',$limit)] = 'dialup21.afn.org ';

            }
        }


        fclose($fn);
        return $this->array;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
