<?php
namespace App\Libraries\BinaryTree;
use App\Libraries\BinaryTree\Node;
class BinaryTree
{
    public $root;

    public function __construct($value = null)
    {
        if ($value !== null) {
            $this->root = new Node($value);
        }
    }

    public function search($value)
    {
        $node = $this->root;

        while($node) {
            if ($value > $node->value) {
                $node = $node->right;
            } elseif ($value < $node->value) {
                $node = $node->left;
            } else {
                break;
            }
        }

        return $node;
    }
    public function insert($value ,$data)
    {
        $node = $this->root;
        if (!$node) {
            return $this->root = new Node($value ,$data);
        }

        while($node) {
            if ($value >= $node->value && $node->data !== $data) {
                if ($node->right) {
                    $node = $node->right;
                } else {
                    $node = $node->right = new Node($value ,$data);
                    break;
                }
            } elseif ($value < $node->value) {
                if ($node->left) {
                    $node = $node->left;
                } else {
                    $node = $node->left = new Node($value ,$data);
                    break;
                }
            } else {
                break;
            }
        }
        return $node;
    }
    public function printTree(Node $node = null)
    {
        if (!$node) {
            $node = $this->root;
        }
        if ($node->right) {
            yield from $this->printTree($node->right);
        }

        yield $node;
        if ($node->left) {
            yield from $this->printTree($node->left);
        }

    }
    public function walk(Node $node = null)
    {
        if (!$node) {
            $node = $this->root;
        }
        if ($node->left) {
            yield from $this->walk($node->left);
        }
        yield $node;
        if ($node->right) {
            yield from $this->walk($node->right);
        }
    }
}
