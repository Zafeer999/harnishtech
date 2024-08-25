<div>
    @if ($deviceType == 'mobile')
        {{-- <a class="mini-cart-icon" href="{{ route('carts') }}"> --}}
            <img alt="Evara" src="{{ asset('customer/assets/imgs/theme/icons/icon-cart.svg') }}">
            <span class="pro-count white">{{ $cartCount }}</span>
        {{-- </a> --}}
    @else
        {{-- <a class="mini-cart-icon" href="{{ route('carts') }}"> --}}
            <img alt="Evara" src="{{ asset('customer/assets/imgs/theme/icons/icon-cart.svg') }}">
            <span class="pro-count blue">{{ $cartCount }}</span>
        {{-- </a> --}}
    @endif
</div>
