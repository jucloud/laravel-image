<?php

namespace App\Image\Models\Traits;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use App\Models\Image\Image;

trait PivotTrait
{

    /**
     * @return mixed
     */
    public function getPivot()
    {
        return $this->pivot;
    }

    /**
     * @return bool
     */
    public function hasPivot()
    {
        return !empty($this->getPivot());
    }

    /**
     * @return mixed|null
     */
    public function getPivotParent()
    {
        if ($this->hasPivot()) {
            return $this->getPivot()->parent;
        } else {
            return null;
        }
    }

}