<?php

namespace App\Services;

use App\Models\ProductGallery;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductImagesService
{
    public function uploadImage($folder = 'products', $request, $productId, $width = 800, $height = 600)
    {
        if (!$request->hasFile('images')) {
            return null;
        }

        $manager = new ImageManager(new Driver());
        $uploaded = [];

        foreach ($request->file('images') as $file) {
            $image = $manager->read($file->getRealPath());

            $image->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $mainPath = public_path("uploads/{$folder}/images");

            if (!file_exists($mainPath)) {
                mkdir($mainPath, 0777, true);
            }

            $imageName = Str::uuid()->toString() . '.webp';
            $imagePath = "uploads/{$folder}/images/{$imageName}";

            $image->toWebp(quality: 60)->save(public_path($imagePath));

            $gallery = ProductGallery::create([
                'product_id' => $productId,
                'image' => $imagePath
            ]);
            $uploaded[] = $gallery;
        }

        return $uploaded;
    }

    public function deleteImage(int $productId): void
    {
        $paths = ProductGallery::where('product_id', $productId)->pluck('image')->toArray();
        if (empty($paths)) return;

        foreach ($paths as $p) {
            $this->deleteSingleImage($p);
        }
        ProductGallery::where('product_id', $productId)->delete();
    }

    protected function deleteSingleImage(?string $imagePath): void
    {
        if ($imagePath && file_exists(public_path($imagePath))) {
            unlink(public_path($imagePath));
        }
    }

    public function editImages($request, $product, $folder)
    {
        if ($request->hasFile('images')) {
            $this->deleteImage($product->id);
            return $this->uploadImage($folder, $request, $product->id, width: 800, height: 600);
        }

        return $product->galleries;
    }
}
