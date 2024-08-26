<div>
    @if ($deviceType == 'mobile')
        <div class="header-action-icon-2">
            <a class="mini-cart-icon" href="{{ route('carts') }}">
                <img alt="Evara" src="{{ asset('customer/assets/imgs/theme/icons/icon-cart.svg') }}">
                <span class="pro-count white">{{ $cartCount }}</span>
            </a>
            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                <ul>
                    @forelse ($cartItems as $cart)
                        <li>
                            <div class="shopping-cart-img">
                                <a href="{{ route('services.show', $cart->id) }}"><img alt="Evara" src="{{ asset($cart->attributes->image) }}"></a>
                            </div>
                            <div class="shopping-cart-title">
                                <h4><a href="{{ route('services.show', $cart->id) }}">{{ $cart->name }}</a></h4>
                                <h3><span>{{ $cart->quantity }} × </span>₹{{ number_format($cart->price) }}</h3>
                            </div>
                            <div class="shopping-cart-delete">
                                <a href="#" class="removeFromCart" data-cart-remove-id="{{ $cart->id }}"><i class="fi-rs-cross-small"></i></a>
                            </div>
                        </li>
                    @empty
                        <li>
                            <h4 class="p-4">No Items In Cart</h4>
                        </li>
                    @endforelse
                </ul>
                <div class="shopping-cart-footer">
                    <div class="shopping-cart-total">
                        <h4>Total <span>₹{{ number_format($cartTotal) }}</span></h4>
                    </div>
                    <div class="shopping-cart-button">
                        <a href="{{ route('carts') }}">View cart</a>
                        <a href="{{ route('checkouts.index') }}">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="header-action-icon-2">
            <a class="mini-cart-icon" href="{{ route('carts') }}">
                <img alt="Evara" src="{{ asset('customer/assets/imgs/theme/icons/icon-cart.svg') }}">
                <span class="pro-count blue">{{ $cartCount }}</span>
            </a>
            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                <ul>
                    @forelse ($cartItems as $cart)
                        <li>
                            <div class="shopping-cart-img">
                                <a href="{{ route('services.show', $cart->id) }}"><img alt="cart-img" src="{{ asset($cart->attributes->image) }}"></a>
                            </div>
                            <div class="shopping-cart-title">
                                <h4><a href="{{ route('services.show', $cart->id) }}">{{ $cart->name }}</a></h4>
                                <h4><span>{{ $cart->quantity }} × </span>₹{{ number_format($cart->price) }}</h4>
                            </div>
                            <div class="shopping-cart-delete">
                                <a href="#" class="removeFromCart" data-cart-remove-id="{{ $cart->id }}"><i class="fi-rs-cross-small"></i></a>
                            </div>
                        </li>
                    @empty
                        <li>
                            <h4 class="p-4">No Items In Cart</h4>
                        </li>
                    @endforelse
                </ul>
                <div class="shopping-cart-footer">
                    <div class="shopping-cart-total">
                        <h4>Total <span>₹{{ number_format($cartTotal) }}</span></h4>
                    </div>
                    <div class="shopping-cart-button">
                        <a href="{{ route('carts') }}" class="outline">View cart</a>
                        <a href="{{ route('checkouts.index') }}">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
