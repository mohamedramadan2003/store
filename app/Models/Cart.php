<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Observers\CartObserver;
use PhpParser\Node\Stmt\Static_;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'cookie_id' , 'user_id' , 'product_id' , 'quantity' ,'options' ,
    ];
    //Events (observers)
    //creating , created , updating , updated , saving ,saved
    //deleting , deleted , restoring , restored , retrieved

    public static function booted()  // دي بتعمل حدث اول ما اضيف بيانات يضيف id ده
    {
        static::observe(CartObserver::class);
        static::addGlobalScope('cookie_id',function(Builder $builder)
        {
            $builder->where('cookie_id' , Cart::getCookieId());
        });
        /*static::creating(function(Cart $cart)
        {
            $cart->id = Str::uuid();
        });*/
    }
      public static function getCookieId()
    {
        $cooke_id = Cookie::get('cart_id');
        if(!$cooke_id)
        {
           $cooke_id =  Str::uuid()->toString();
           Cookie::queue('cart_id',$cooke_id , 30 * 24 * 60);
        }
        return $cooke_id ;
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name'=> 'Anonymous',
        ]);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
