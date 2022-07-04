<?php


namespace Binary {

    class Node
    {
        public ?Node $left = null;

        public ?Node $right = null;

        public function __construct(public int $value){}

        public function toArray(): array
        {
            return [
                $this->left?->toArray(),
                $this->value,
                $this->right?->toArray()
            ];
        }
    }

    final class Tree
    {
        protected ?Node $root = null;

        public function __construct(){}

        public static function create(): Tree
        {
            return new self();
        }

        public function isEmpty(): bool
        {
            return $this->root === null;
        }


        public function add(int $item): Tree
        {
            return $this->addNode(new Node($item));
        }


        public function addNode(Node $node): Tree
        {
            if ($this->isEmpty()) {
                $this->root = $node;
            } else {
                /** @noinspection PhpUnhandledExceptionInspection */
                $this->insertNode($node, $this->root);
            }

            return $this;
        }


        /**
         * @throws \Exception
         */
        protected function insertNode(Node $node, ?Node &$subtree): Tree
        {
            if ($subtree === null) {
                $subtree = $node;
            } else {
                if ($node->value > $subtree->value) {
                    $this->insertNode($node, $subtree->right);
                } else if ($node->value < $subtree->value) {
                    $this->insertNode($node, $subtree->left);
                } else {
                    throw new \Exception("Duplicate value: {$node->value}");
                }
            }

            return $this;
        }


        public function toArray(): ?array
        {
            return $this->root?->toArray();
        }

        public function dump(): void
        {
            var_dump($this->toArray());
        }
    }
}