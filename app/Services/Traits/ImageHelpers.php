<?php
namespace App\Services\Traits;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 2/6/17
 * Time: 8:21 AM
 */

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait ImageHelpers
{


    /**
     * @param Model $model
     * @param Request $request
     * @param array $inputNames
     * @param array $sizes
     * @param array $dimensions
     * @param boolean $ratio
     * @return null
     */
    public function saveMimes(Model $model,
                              Request $request,
                              $inputNames = ['pdf'],
                              $dimensions = ['1052', '1320'],
                              $ratio = true,
                              $sizes = ['large', 'medium', 'thumbnail'])
    {
        try {
            foreach ($inputNames as $key => $inputName) {
                if ($request->hasFile($inputName)) {
                    if (in_array($request->file($inputName)->extension(), ['pdf', 'ppt'], true)) {
                        $path = $request->$inputName->store('public/uploads/files');
                        $path = str_replace('public/uploads/files/', '', $path);
                        $model->update([
                            $inputName => $path,
                        ]);
                    } else {
                        $imagePath = $request->$inputName->store('public/uploads/images');
                        $imagePath = str_replace('public/uploads/images/', '', $imagePath);
                        $img = Image::make(storage_path('app/public/uploads/images/' . $imagePath));
                        foreach ($sizes as $key => $value) {
                            if ($value === 'large') {
                                $img->resize($dimensions[0], $dimensions[1]);
                                $img->save(storage_path('app/public/uploads/images/' . $value . '/' . $imagePath));
                            } elseif ($value === 'medium') {
                                $img->resize($dimensions[0] / 2, $dimensions[1] / 2);
                                $img->save(storage_path('app/public/uploads/images/' . $value . '/' . $imagePath));
                            } elseif ($value === 'thumbnail') {
                                $img->resize('292', '347');
                                $img->save(storage_path('app/public/uploads/images/' . $value . '/' . $imagePath));
                            }
                        }
                        $model->update([
                            $inputName => $imagePath,
                        ]);
                        Storage::delete('public/uploads/images/' . $imagePath);
                    }
                } else {
                    // in case there is no file
                    continue;
                }
            }
        } catch (\Exception $e) {
            abort(404, 'save Error : ' . $e->getMessage());
        }
    }


    /**
     * @param Request $request
     * @param array $inputNames
     * @param string $width
     * @param string $height
     */
    public function saveImage(Request $request,
                              $inputNames = 'image',
                              $dimensions = ['1200', '560'],
                              $sizes = ['large', 'medium', 'thumbnail'])
    {
        try {
            foreach ($inputNames as $inputName) {
                if ($request->hasFile($inputName)) {
                    if (in_array($request->file($inputName)->extension(), ['pdf', 'ppt'], true)) {
                        $pdfPath = $request->$inputName->store('public/uploads/files');
                        $pdfPath = str_replace('public/', '', $pdfPath);
                        return $pdfPath;
                    } else {
                        $imagePath = $request->$inputName->store('public/uploads/images');
                        $imagePath = str_replace('public/uploads/images/', '', $imagePath);
                        $img = Image::make(storage_path('app/public/uploads/images/' . $imagePath));
                        foreach ($sizes as $key => $value) {
                            switch ($value) {
                                case $value === 'large' :
                                    $this->saveIt($img, $dimensions[0], $value, $imagePath);
                                    break;
                                case $value === 'medium' :
                                    $this->saveIt($img, $dimensions[0] / 2, $value, $imagePath);
                                    break;
                                case $value === 'thumbnail' :
                                    $this->saveIt($img, $dimensions[0] / 3, $value, $imagePath);
                                    break;
                                default :
                                    $this->saveIt($img, $dimensions[0] / 2, $value, $imagePath);
                            }
                        }
                        Storage::delete('public/uploads/images/' . $imagePath);
                        return $imagePath;
                    }
                } else {
                    // in case there is no file
                    return null;
                }
            }
        } catch
        (\Exception $e) {
            abort(404, 'save Image Error : ' . $e->getMessage());
        }
    }


    /**
     * @param Model $model
     * @param Request $request
     * @param string $inputName
     * @param array $dimensions
     * @param bool $ratio
     * @param array $sizes
     */
    public function saveGallery(Model $model,
                                Request $request,
                                $inputName = 'images',
                                $dimensions = ['1052', '1320'],
                                $ratio = true,
                                $sizes = ['large', 'medium', 'thumbnail'])
    {
        try {
            if ($request->hasFile($inputName)) {
                if (count($request[$inputName]) > 1) {
                    foreach ($request[$inputName] as $image) {
                        $imagePath = $this->saveImageForGallery($image, $dimensions, $ratio, $sizes, $model);
                        $model->images()->create([
                            'image' => $imagePath,
                        ]);
                    }
                } else {
                    $imagePath = $this->saveImageForGallery($request->images[0], $dimensions, $ratio, $sizes, $model);
                    $model->images()->create([
                        'image' => $imagePath,
                    ]);
                }
            } else {
                return null;
            }
        } catch (\Exception $e) {
            abort(404, 'save Error : ' . $e->getMessage());
        }
    }

    public function saveIt($img, $width, $sizeType, $imagePath)
    {
        $img->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save(storage_path('app/public/uploads/images/' . $sizeType . '/' . $imagePath));
    }

    public function saveImageForGallery($image, $dimensions, $ration, $sizes, $model)
    {
        $imagePath = $image->store('public/uploads/images');
        $imagePath = str_replace('public/uploads/images/', '', $imagePath);
        $img = Image::make(public_path('storage/uploads/images/' . $imagePath));
        foreach ($sizes as $key => $value) {
            if ($value === 'large') {
                $img->resize($dimensions[0], $dimensions[1]);
                $img->save(public_path('storage/uploads/images/' . $value . '/' . $imagePath));
            } elseif ($value === 'medium') {
                $img->resize($dimensions[0] / 2, $dimensions[1] / 2);
                $img->save(public_path('storage/uploads/images/' . $value . '/' . $imagePath));
            } elseif ($value === 'thumbnail') {
                $img->resize('292', '347');
                $img->save(public_path('storage/uploads/images/' . $value . '/' . $imagePath));
            }
        }
        Storage::delete(public_path('storage/uploads/images/' . $imagePath));
        return $imagePath;
    }
}