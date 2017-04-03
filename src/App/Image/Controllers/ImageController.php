<?php

namespace App\Image\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Image\ImageService;

class ImageController extends BaseController
{

    /**
     * @param $template
     * @param $image_name
     * @return mixed|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public static function showImage($template, $image_name)
    {
        $imageService = new ImageService();
        return $imageService->showImage($template, $image_name);
    }

}
