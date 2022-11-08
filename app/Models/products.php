<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;

class products extends Model
{
    use HasFactory, Searchable;

    public static function validate(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|gt:0',
            'image' => 'image',
        ]);
    }

    public function setItems($items)
    {
        $this->items = $items;
    }

    public function getOrders()
    {
        return $this->items;
    }

    public function orders()
    {
        return $this->hasMany('Item::class');
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getName()
    {
        return strtoupper($this->attributes['name']);
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setCreatedAt($created_at)
    {
        $this->attributes['created_at'] = $created_at;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setUpdatedAt($updated_at)
    {
        $this->attributes['updated_at'] = $updated_at;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public static function sumPricesByQuantities($products, $productsInSession)
    {
        $total = 0;
        foreach ($products as $product) {
            $total = $total + ($product->getPrice() * $productsInSession[$product->getId()]);
        }

        return $total;
    }

    public function product($product)
    {
        return $this->belongsTo('Product::class');
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function searchableAs()
    {
        return 'products_index';
    }
}
