<?php
namespace app\Libraries ;

class HashTable{
    public function hashString(string $str ,int $limit):int {

        $hash = 0 ;
        $p = 31 ;
        for($i = 0;$i < strlen($str);$i++){
            $hash+= (ord($str[$i]) * pow($p ,$i)) % $limit;
        }
        return $hash;
    }
}
