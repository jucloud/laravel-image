<?php

namespace App\Image\Models\Traits;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use App\Models\Image\Image;

trait HasImageablesTrait
{

    /**
     * @return mixed|MorphToMany
     */
    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable', 'imageables', null, 'image_id')
            ->withPivot('is_main', 'type', 'data');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function main_images()
    {
        return $this->images()->wherePivot('is_main', '=', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function type_images($type)
    {
        return $this->images()->wherePivot('type', '=', $type);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function type_main_images($type)
    {
        return $this->main_images()->wherePivot('type', '=', $type);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @return Image|null
     */
    public function getMainImage()
    {
        return $this->main_images()->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getMainImages()
    {
        return $this->main_images()->get();
    }

    /**
     * @param $type
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTypeImages($type)
    {
        return $this->type_images($type)->get();
    }

    /**
     * @param $type
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTypeMainImages($type)
    {
        return $this->type_main_images($type)->get();
    }

    /**
     * @param Image $image
     * @return int
     */
    public function setAsMainImage(Image $image)
    {
        $this->images()->rawUpdate(['is_main' => false]);
        return $this->images()->updateExistingPivot($image->getKey(), ['is_main' => true]);
    }

    /**
     * @param string $type
     * @param Image $image
     * @return int
     */
    public function setAsTypeMainImage($type, Image $image)
    {
        $this->type_images($type)->rawUpdate(['is_main' => false]);
        return $this->type_images($type)->updateExistingPivot($image->getKey(), ['is_main' => true]);
    }

    /**
     * @param bool $withimageId
     * @return \Illuminate\Support\Collection
     */
    public function getImageUrls($withimageId = false)
    {
        return $this->getNamedImageUrls('image_url', $withimageId);
    }

    /**
     * @param $imageUrlAttributeName
     * @param bool $withimageId
     * @return \Illuminate\Support\Collection
     */
    public function getNamedImageUrls($imageUrlAttributeName, $withimageId = false)
    {
        $key = $withimageId ? 'image_id' : null;
        return $this->getImages()->pluck($imageUrlAttributeName, $key);
    }

    /**
     * @param $type
     * @param $imageUrlAttributeName
     * @param bool $withImageId
     * @return \Illuminate\Support\Collection
     */
    public function getTypeNamedImageUrls($type, $imageUrlAttributeName, $withImageId = false)
    {
        $key = $withImageId ? 'image_id' : null;
        return $this->getTypeImages($type)->pluck($imageUrlAttributeName, $key);
    }

}