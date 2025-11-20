<?php

namespace App\Services;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageHandlerService
{



    public function uploadImage($folder = 'images', $request, $width = 800, $height = 600)
    {
        if (!$request->hasFile('image')) {
            return null;
        }

        $manager = new ImageManager(new Driver());
        $imageFile = $request->file('image');
        $realPath = $imageFile->getPathname();
        $image = $manager->read($realPath);

        $image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $mainPath = public_path("uploads/{$folder}/images");
        $thumbPath = public_path("uploads/{$folder}/thumbs");

        if (!file_exists($mainPath)) {
            mkdir($mainPath, 0777, true);
        }


        $imageName = time() . '.webp';
        $imagePath = "uploads/{$folder}/images/{$imageName}";
        $image->toWebp(quality: 60)->save(public_path($imagePath));

        $result = [
            'image' => $imagePath,
        ];



        return $result;
    }





    public function deleteImage(array|string|null $path): void
    {
        if (!$path) return;

        if (is_array($path)) {
            foreach ($path as $p) {
                $this->deleteSingleImage($p);
            }
        } else {
            $this->deleteSingleImage($path);
        }
    }

    protected function deleteSingleImage(?string $imagePath): void
    {
        if (!$imagePath) return;

        if (file_exists(public_path($imagePath))) {
            unlink(public_path($imagePath));
        }
    }

    public function editImage($request, $obj, $folder)
    {
        $imgUrl = $obj->image ?? null;

        if ($request->hasFile('image') && $request->image != $obj->image) {
            $this->deleteImage($imgUrl);
            $imgUrl = $this->uploadImage($folder, $request, width: 800, height: 600);
        }

        return $imgUrl;
    }
}
