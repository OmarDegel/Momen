<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Event;

class ProductService
{
    private $imageService;
    public function __construct(ProductImagesService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function handleProductChildren($request, $product, $parentAttributes = [])
    {
        if (!$request->has('children') || !is_array($request->children)) {
            return;
        }
        if (empty($parentAttributes)) {
            $parentAttributes = Arr::except($product->toArray(), [
                'price',
                'offer_price',
                'is_offer',
                'color_id',
                'size_id',
                'id',
                'created_at',
                'updated_at',
            ]);
        }

        Model::withoutEvents(function () use ($request, $product, $parentAttributes) {
            $receivedIds = [];

            foreach ($request->children as $childData) {
                $data = array_merge($parentAttributes, Arr::except($childData, ['id']));
                $data['parent_id'] = $product->id;

                $child = null;

                if (isset($childData['id'])) {
                    $child = $product->children()->find($childData['id']);
                    if ($child) {
                        $child->update($data);
                    }
                }

                if (!$child) {
                    if (isset($childData['color_id']) && isset($childData['price'])) {
                        $child = $product->children()->create($data);
                    }
                }

                if ($child) {
                    if (isset($childData['images']) && is_array($childData['images'])) {
                        $this->handleChildImages($child, $childData['images']);
                    }

                    if (isset($childData['sizes']) && is_array($childData['sizes'])) {
                        $child->sizes()->sync($childData['sizes']);
                    }
                    if(isset($childData['delete_ids[']) && is_array($childData['delete_ids['])){   
                        $arr=implode(',', $childData['delete_ids[']); 
                        $this->imageService->deleteImages($arr);
                    }
                    $receivedIds[] = $child->id;
                }
            }

            $product->children()->whereNotIn('id', $receivedIds)->delete();
        });
    }


    protected function handleChildImages(Product $child, array $imageData): void
    {
        if ($child->images()->count() > 0) {
            $this->imageService->deleteImage($child->id);
            $child->images()->delete();
        }


        
            $this->imageService->uploadImage('products', $imageData, $child->id);

    }
}
