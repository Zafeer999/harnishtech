<?php

namespace App\Http\Livewire\Customer;

use App\Models\Category;
use Livewire\Component;

class HeaderCart extends Component
{
    protected $listeners = ['cartdata'=> 'useCartData', 'removeCartData' => 'useRemoveCartData'];

    // PROP VARIABLES
    public $data = [];
    public $deviceType = '';
    public $cartCount = 0;

    public function render()
    {
        $cartItems = \Cart::getContent();
        $cartTotal = Category::whereIn('id', $cartItems->pluck('id'))->sum('min_price');

        $this->cartCount = count($cartItems) ?? 0;

        return view('livewire.customer.header-cart')->with(['cartItems' => $cartItems, 'cartTotal' => $cartTotal]);
    }


    public function useCartData($data)
    {
        $service = Category::find($data['service_id']);
        if($service)
        {
            \Cart::add(array(
                'id' => $data['service_id'],
                'name' => $service->name,
                'price' => $service->min_price,
                'quantity' => isset($data['quantity']) ? $data['quantity'] : 1,
                'attributes' => ['image' => $service->image, 'description' => $service->description],
            ));
        }

        $this->data['service_id'] = $data['service_id'];
    }

    public function useRemoveCartData($data = null)
    {
        if(!$data)
        {
            \Cart::clear();
        }
        else
        {
            $service = Category::find($data['service_id']);

            if($service)
            {
                \Cart::remove($data['service_id']);
            }
        }
    }
}
