<?php

namespace App\Services;

use Illuminate\Support\Arr;
use App\Services\ProductImagesService;
use Illuminate\Database\Eloquent\Model;

class ProductService
{
    protected $imagesService;
    public function __construct(ProductImagesService $imagesService)
    {
        $this->imagesService = $imagesService;
    }


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
            'color_id',
            'children',
            'images',
        ]);

        Model::withoutEvents(function () use ($parentAttributes, $product, $request) {
            $receivedIds = [];

            foreach ($request->children as $index => $childData) {
                $data = array_merge($parentAttributes, Arr::except($childData, ['id']));
                $data['parent_id'] = $product->id;

                $childImages = $request->file("children.$index.images") ?? [];

                if (isset($childData['id'])) {
                    $child = $product->children()->find($childData['id']);
                    if ($child) {
                        $child->update($data);
                        $receivedIds[] = $child->id;
                        if (!empty($childImages)) {
                            $this->imagesService->deleteImage($child->id);
                            $this->imagesService->uploadImage('products', $childImages, $child->id);
                        }
                    }
                } else {
                    if (isset($childData['size_id'])) {
                        $newChild = $product->children()->create($data);
                        $receivedIds[] = $newChild->id;

                        if (!empty($childImages)) {
                            $this->imagesService->uploadImage('products', $childImages, $newChild->id);
                        }
                    }
                }
            }

            $product->children()->whereNotIn('id', $receivedIds)->delete();
        });
    }
}
