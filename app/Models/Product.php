<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $with = ['category', 'tags'];

    protected $fillable = ['name', 'description', 'price', 'category_id', 'image'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    function category() {
        return $this->belongsTo(Category::class);
    }

    function tags() {
        return $this->belongsToMany(Tag::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? $value : 'images/No_images_available.webp',
        );
    }

    protected function categoryName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['category_id'] ? $this->category->name : '-',
        );
    }
}