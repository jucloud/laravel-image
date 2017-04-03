<?php

namespace App\Image\Models;

use App\Base\Models\BaseModel;
use App\Models\Image\Image;

class ImageHash extends BaseModel
{

    protected $table = 'image_hashes';

    protected $primaryKey = 'image_hash_id';

    protected $fillable = ['image_id', 'file_sha1'];

    protected $hidden = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'image_id');
    }

}
