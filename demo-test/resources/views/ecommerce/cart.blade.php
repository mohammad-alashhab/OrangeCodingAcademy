<x-ecommerce-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title mb-25"> Cart</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a href="index-2.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span>Shopping Cart</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- cart section start -->
    <section class="cart__section section--padding">
        <div class="container-fluid">
            <div class="cart__section--inner">
                <h2 class="cart__title mb-30">Shopping Cart</h2>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart__table">
                            <table class="cart__table--inner">
                                <thead class="cart__table--header">
                                    <tr class="cart__table--header__items">
                                        <th class="cart__table--header__list">Product</th>
                                        <th class="cart__table--header__list">Price</th>
                                        <th class="cart__table--header__list">Quantity</th>
                                        <th class="cart__table--header__list">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="cart__table--body">
                                    @foreach($cartItems as $item)
                                    <tr class="cart__table--body__items">
                                        <td class="cart__table--body__list">
                                            <div class="cart__product d-flex align-items-center">
                                                <button class="cart__remove--btn" aria-label="search button" type="button" onclick="deleteCartItem(`{{ $item->id }}`)">
                                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16px" height="16px">
                                                        <path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z" />
                                                    </svg>
                                                </button>
                                                <div class="cart__thumbnail">
                                                    <a href="{{ route('product-details.ecommerce', $item->product->id) }}">
                                                        <img class="border-radius-5" src="{{ asset('storage/' . $item->product->images->front_img) }}" alt="cart-product">
                                                    </a>
                                                </div>
                                                <div class="cart__content">
                                                    <h3 class="cart__content--title h4">
                                                        <a href="{{ route('product-details.ecommerce', $item->product->id) }}">{{ $item->product->name }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__table--body__list">
                                            <span class="cart__price">${{ number_format($item->product->price, 2) }}</span>
                                        </td>
                                        <td class="cart__table--body__list">
                                            <div class="quantity__box">
                                                <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                                <label>
                                                    <input type="number" class="quantity__number quickview__value--number" value="{{ $item->quantity }}" data-counter />
                                                </label>
                                                <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                                            </div>
                                        </td>
                                        <td class="cart__table--body__list">
                                            <span class="cart__price end">${{ number_format($item->product->price * $item->quantity, 2) }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="cart__summary--footer">
                                <p class="cart__summary--footer__desc">Shipping & taxes calculated at checkout</p>
                            </div>
                            <div class="continue__shopping d-flex justify-content-between">
                                <button class="continue__shopping--clear" type="submit">Clear Cart</button>
                                <button class="continue__shopping--clear">
                                    <a class="cart__summary--footer__btn primary__btn checkout" href="{{ route('checkout.ecommerce') }}">Check Out</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart section end -->


    <!-- Start brand section -->
    <div class="brand__section section--padding pt-0">
        <div class="container">
            <div class="brand__section--inner d-flex justify-content-between align-items-center">
                @foreach ($brands as $brand)
                <div class="brang__logo--items">
                    @if ($brand->img)
                    <img class="brang__logo--img" src="{{ asset('storage/' . $brand->img) }}" alt="{{ $brand->name }} logo">
                    @else
                    <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                        <span class="text-indigo-600 font-medium text-lg">{{ substr($brand->name, 0, 1) }}</span>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End brand section -->

    <!-- Start shipping section -->
    <section class="shipping__section">
        <div class="container">
            <div class="shipping__inner style2 d-flex">
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="assets/img/other/shipping1.webp" alt="icon-img">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">Free Shipping</h2>
                        <p class="shipping__content--desc">Free shipping over $100</p>
                    </div>
                </div>
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="assets/img/other/shipping2.webp" alt="icon-img">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">Support 24/7</h2>
                        <p class="shipping__content--desc">Contact us 24 hours a day</p>
                    </div>
                </div>
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="assets/img/other/shipping3.webp" alt="icon-img">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">100% Money Back</h2>
                        <p class="shipping__content--desc">You have 30 days to Return</p>
                    </div>
                </div>
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="assets/img/other/shipping4.webp" alt="icon-img">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">Payment Secure</h2>
                        <p class="shipping__content--desc">We ensure secure payment</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End shipping section -->

    <!-- JavaScript for deleting cart items -->
    <script>
        function deleteCartItem(cartId) {
            if (confirm('Are you sure you want to remove this item from your cart?')) {
                fetch(`/cart/${cartId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            location.reload(); // Reload the page to reflect changes
                        } else {
                            alert(data.message || 'Failed to remove item from cart.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while removing the item.');
                    });
            }
        }
    </script>



</x-ecommerce-app-layout>