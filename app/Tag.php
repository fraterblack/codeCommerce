<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function products()
    {
        return $this->belongsToMany('CodeCommerce\Product');
    }

    /**
     * Separa as tags e guarda no banco de dados
     * @param $tags String
     * @return array
     */
    public function store($tags)
    {
        $tags = array_map('trim', explode(",", $tags));
        $tagsId = [];
        foreach ($tags as $tag) {
            if (!empty($tag)) {
                $newTag = $this->firstOrCreate(['name' => $tag]);
                $tagsId[] = $newTag->id;
            }
        }

        return $tagsId;
    }
}