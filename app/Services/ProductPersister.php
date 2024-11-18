<?php

namespace App\Services;

use App\Models\Product;

class ProductPersister
{
    public function saveProduct(array $data): Product
    {
        return Product::updateOrCreate(
            ['name' => $data['name']],
            [
                'description' => $data['description'],
                'price' => $data['price'],
                'image_url' => $data['image_url'],
            ]
        );
    }
}
