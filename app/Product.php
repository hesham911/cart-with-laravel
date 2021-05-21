<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    /**
     * @var array
     */
    protected $fillable = ['name','description','category_id','brand_id','price'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Category::class,'brand_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withPivot('quantity')->withTimestamps();
    }

    /**
     * @param Media|null $media
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(512)//Define thumbnail size in pixels
            ->height(512);

        $this->addMediaConversion('large')
            ->width(1536)//Define large image size in pixels
            ->height(1536);
    }

    /**
     * @param $search_keyword
     * @param $price
     * @param $brands
     * @param $categories
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function filter($search_keyword, $price, $brands, $categories) {
        $products = Product::query();

            //dd($products);
        if($search_keyword && !empty($search_keyword)) {
            $products->where(function($q) use ($search_keyword) {
                $q->where('products.name', 'like', "%{$search_keyword}%");
            });
        }

        // Filter By brands
        if($brands && $brands!= null) {

            $products = $products->whereIn('products.brand_id', $brands);
        }
        // Filter By categories
        if($categories && $categories!= null) {
            $products = $products->whereIn('products.category_id', $categories);
        }

        // Filter By prices
        if ($price && $price != null ) {
            $products = $products->whereBetween('products.price', $price);
        }

         return $products->paginate(4);

    }
}
