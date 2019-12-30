<?php

namespace App;

use App\Libraries\HashTable;
use App\Libraries\BinaryTree\BinaryTree;
use Illuminate\Database\Eloquent\Model;

class Visitor extends model
{
    private $file;
    public function __construct()
    {
        $this->hash_table = new HashTable();
        $this->file  = @fopen(asset('NASA_access_log_Jul95'),"r");
     }


    /**
     * @description Algorithm used HashTables insertion time complexity O(1) / print time complexity O(n)
     * no hashtable techniques used to avoid duplication of records ,
     * pagination used to avoid looping over 1M and 800K records :D
     * @param int $offset
     * @param int $limit
     * @return array
     */
    public function getUniqueVisitors($offset ,$limit){
        $fn = $this->file;
        $visitors = [];
        $this->movingFilePointer($fn ,$offset);
        for($i = 0;$i < $limit;$i++){
            $result = fgets($fn);
            preg_match('/.+?(?= - -)/', $result,$match);
            if(isset($match[0])){
                if(isset($this->visitors[$this->hash_table->hashString($match[0] ,$limit)])){
                    continue;
                }
                $visitors[$this->hash_table->hashString($match[0],$limit)] = $match[0];
            }
        }
        fclose($fn);
        return $visitors;
    }
    private function movingFilePointer($fn ,int $offset){
        for ($i = 0;$i < $offset;$i++ ){fgets($fn);}
    }
}
