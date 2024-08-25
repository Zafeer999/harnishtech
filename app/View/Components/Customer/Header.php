<?php

namespace App\View\Components\Customer;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Category::where('category_id', null)->get();
        $authUser = Auth::user();
        $userRole = $authUser?->roles()->first();


        return view('components.customer.header')->with(['categories'=> $categories, 'authUser' => $authUser, 'userRole' => $userRole]);
    }
}
