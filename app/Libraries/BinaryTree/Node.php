<?php
namespace App\Libraries\BinaryTree ;



class Node
{
    public $value, $left, $right ,$data;

    public function __construct($value ,$data)
    {
        $this->value = $value;
        $this->data = $data ;
    }
}



