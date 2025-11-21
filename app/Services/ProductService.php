<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class ProductService
{
    private $imageService;

    public function __construct(ProductImagesService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function handleProductChildren($request, Product $product, $parentAttributes = [])
    {
        if (!$request->has('children') || !is_array($request->children)) return;

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
                'date_start',
                'date_end'
            ]);
        }

        Model::withoutEvents(function () use ($request, $product, $parentAttributes) {
            $receivedIds = [];

            foreach ($request->children as $childData) {
                $data = array_merge($parentAttributes, Arr::except($childData, ['id', 'delete_ids', 'images']));
                $data['parent_id'] = $product->id;

                $child = null;

                // تحديث أو إنشاء الـ Child
                if (isset($childData['id'])) {
                    $child = $product->children()->find($childData['id']);
                    if ($child) $child->update($data);
                }

                if (!$child && isset($childData['color_id'], $childData['price'])) {
                    $child = $product->children()->create($data);
                }

                if ($child) {
                    // التعامل مع الصور القديمة والجديدة
                    $childImages = $childData['images'] ?? [];
                    $deleteIds = [];
                    if (!empty($childData['delete_ids'])) {
                        $deleteIds = is_string($childData['delete_ids'])
                            ? array_filter(explode(',', $childData['delete_ids']))
                            : (array)$childData['delete_ids'];
                    }

                    if (!empty($childImages) || !empty($deleteIds)) {
                        // حذف الصور القديمة إذا تم تحديدها
                        if (!empty($deleteIds)) {
                            $this->imageService->deleteImages($deleteIds);
                        }
                        // رفع الصور الجديدة
                        if (!empty($childImages)) {
                            $this->imageService->uploadImage('products', $childImages, $child->id);
                        }
                    }

                    // مزامنة الأحجام
                    if (isset($childData['sizes']) && is_array($childData['sizes'])) {
                        $child->sizes()->sync($childData['sizes']);
                    }

                    $receivedIds[] = $child->id;
                }
            }

            // حذف الأطفال الغير موجودين
            $product->children()->whereNotIn('id', $receivedIds)->delete();
        });
    }
}
