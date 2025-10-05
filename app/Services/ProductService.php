<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class ProductService
{
    


    public function handleProductChildren($request, $product)
    {
        if (!$request->has('children') || !is_array($request->children)) return;

        $parentAttributes = Arr::except($request->all(), [
            'price',
            'offer_price',
            'is_offer',
            'size_id',
            'id',
            'created_at',
            'updated_at',
            'deleted_at',
            'colors',
            'children',
            'images',
        ]);

        Model::withoutEvents(function () use ($parentAttributes, $product, $request) {
            $receivedIds = [];

            foreach ($request->children as $childData) {
                $data = array_merge($parentAttributes, Arr::except($childData, ['id', 'colors']));
                $data['parent_id'] = $product->id;

                if (isset($childData['id'])) {
                    $child = $product->children()->find($childData['id']);
                    if ($child) {
                        $child->update($data);
                        $receivedIds[] = $child->id;

                        if (isset($childData['colors']) && is_array($childData['colors'])) {
                            $child->colors()->sync($childData['colors']);
                        }
                    }
                } else {
                    if (isset($childData['size_id'])) {
                        $newChild = $product->children()->create($data);
                        $receivedIds[] = $newChild->id;

                        if (isset($childData['colors']) && is_array($childData['colors'])) {
                            $newChild->colors()->sync($childData['colors']);
                        }
                    }
                }
            }

            $product->children()->whereNotIn('id', $receivedIds)->delete();
        });
    }

}
