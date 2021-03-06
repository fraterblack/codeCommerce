<?php

namespace CodeCommerce;


class Cart
{
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function add($id, $name, $price)
    {
        $this->items += [
            $id => [
                'qtd' => isset($this->items[$id]) ? $this->items[$id]['qtd']++ : 1,
                'price' => $price,
                'name' => $name
            ]
        ];

        return $this->items;
    }

    public function update($id, $qtd)
    {
        if ($qtd > 0) {
            $this->items[$id]['qtd'] = $qtd;
        } else {
            $this->remove($id);
        }
    }

    public function remove($id)
    {
        unset($this->items[$id]);
    }

    public function clear()
    {
        $this->items = [];
    }

    public function all()
    {
        return $this->items;
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['qtd'] * $item['price'];
        }

        return $total;
    }
}