<?php

namespace App\Http\Middleware;
use Closure;
use View;
use App\Helpers\CartCalculator;

class SharedCartInfo
{
    
 private $CartCalculator;
    public function __construct(CartCalculator $CartCalculator)
    {
        $this->CartCalculator = $CartCalculator;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        View::share('carts', $this->CartCalculator->getCarts());
        View::share('carts_total', $this->CartCalculator->getTotalPrice());
        View::share('carts_size', $this->CartCalculator->getSize());
        return $next($request);
    }
}
