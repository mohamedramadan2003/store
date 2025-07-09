<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable =  ['name','price'];
    public $timestamps = false;

    public function scopeFilter(Builder $builder , $filter)  {
       $option = array_merge([
            'id' => null,
            'name' => null,
            'price' => null,
        ], $filter);
        $builder->when($option['id'] , function($builder , $value)
        {
            $builder->where('id',$value);
        });
          $builder->when($option['name'] , function($builder , $value)
        {
            $builder->where('name',$value);
        });
          $builder->when($option['price'] , function($builder , $value)
        {
            $builder->where('price',$value);
        });
    }

}
