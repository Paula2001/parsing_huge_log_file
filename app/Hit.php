<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Libraries\BinaryTree\BinaryTree;
class Hit
{
    public function __construct()
    {
        $this->file  = @fopen(asset('NASA_access_log_Jul95'),"r");
    }
    public function __destruct()
    {
        fclose($this->file);
    }

    public function getHits($offset ,$limit){
        $arr = [] ;
        $this->movingFilePointer($this->file ,$offset);
        for ($s = 0 ;$s < $limit; $s++){
            $result = fgets($this->file);
            preg_match('/\s[\/:].+?(?=H)/',$result,$urlArr);
            preg_match('/\d+$/',$result,$hitsArr);
            try {
                $hitsArr[0];
            }catch (\Exception $f){
                continue;
            }
            try {
                $urlArr[0];
            }catch (\Exception $f){
                continue;
            }
            $h = [
                'url' => trim($urlArr[0]) ,
                'hits' => trim($hitsArr[0])
            ];
            array_push($arr,$h);
        }
        return $arr;
    }
    public function getTopHitsDesc($offset ,$limit)
    {
        $bst = new BinaryTree();
        $this->movingFilePointer($this->file ,$offset);
        for($i = 0;$i < $limit;$i++){
            $result = fgets($this->file);
            preg_match('/\s[\/:].+?(?=H)/',$result,$urlArr);
            preg_match('/\d+$/',$result,$hitsArr);
            try {
                $hitsArr[0];
            }catch (\Exception $e){
                continue;
            }
            try {
                $urlArr[0];
            }catch (\Exception $e){
                continue;
            }
            $bst->insert((int) $hitsArr[0] , (string) $urlArr[0]);
        }
        $tree =$bst->printTree();
        $arr = [] ;
        foreach($tree as $node) {
            array_push($arr,[
                'hits'=>$node->value,
                'url'=>trim($node->data)
            ]);
        }
        return $arr ;
    }
    private function movingFilePointer($fn ,int $offset){
        for ($i = 0;$i < $offset;$i++ ){fgets($fn);}
    }


}
