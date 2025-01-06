<x-ecommerce-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <!-- Start slider section -->
    <section class="hero__slider--section slider__section--bg3">
        <div class="container">
            <div class="hero__slider--inner hero__slider--activation swiper">
                <div class="hero__slider--wrapper swiper-wrapper">
                    <div class="swiper-slide ">
                        <div class="hero__slider--items__style3 d-flex align-items-center justify-content-between">
                            <div class="slider__content style3">
                                <span class="slider__subtitle style3">Lowest Price</span>
                                <h2 class="slider__maintitle style3 text__secondary h1">Everything</h2>
                                <p class="slider__desc style3">High Quality - Extreme Performance</p>
                                <a class="primary__btn slider__btn" href="{{ route('shop.ecommerce') }}">
                                    Shop now
                                    <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58745 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178V3.6178Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                            <div class="hero__slider--layer__style3">
                                <img class="slider__layer--img " src="assets/img/slider/home3-slider1-layer.webp" alt="slider-img">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="hero__slider--items__style3 d-flex align-items-center justify-content-between">
                            <div class="slider__content style3">
                                <span class="slider__subtitle style3">Lowest Price</span>
                                <h2 class="slider__maintitle style3 text__secondary h1">Everything</h2>
                                <p class="slider__desc style3">High Quality - Extreme Performance</p>
                                <a class="primary__btn slider__btn" href="{{ route('shop.ecommerce') }}">
                                    Shop now
                                    <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58745 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178V3.6178Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                            <div class="hero__slider--layer__style3">
                                <img class="slider__layer--img " src="assets/img/slider/home3-slider2-layer.webp" alt="slider-img">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="hero__slider--items__style3 d-flex align-items-center justify-content-between">
                            <div class="slider__content style3">
                                <span class="slider__subtitle style3">Lowest Price</span>
                                <h2 class="slider__maintitle style3 text__secondary h1">Everything</h2>
                                <p class="slider__desc style3">High Quality - Extreme Performance</p>
                                <a class="primary__btn slider__btn" href="{{ route('shop.ecommerce') }}">
                                    Shop now
                                    <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58745 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178V3.6178Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                            <div class="hero__slider--layer__style3">
                                <img class="slider__layer--img " src="assets/img/slider/home3-slider3-layer.webp" alt="slider-img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider__pagination swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- End slider section -->

    <!-- Start value proposition section -->
    <section class="shipping__section">
        <div class="container">
            <div class="shipping__inner style2 d-flex mt-5">
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
    <!-- End value proposition section -->

    <!-- Start banner section -->
    <section class="banner__section section--padding pt-0">
        <div class="container">
            <div class="row  mb--n30">
                <div class="col-lg-6 col-md-6 mb-30">
                    <div class="banner__items position__relative">
                        <a class="banner__thumbnail display-block" href="{{ route('shop.ecommerce') }}"><img class="banner__thumbnail--img" src="assets/img/banner/banner16.webp" alt="banner-img">
                            <div class="banner__content--style4">
                                <span class="banner__content--style4__badge">Mega Sale</span>
                                <h2 class="banner__content--style4__title font__style">HELIX ENGINE <span> FUILS</span></h2>
                                <div class="banner__price--style4">
                                    <span class="current__price">$239.52</span>
                                    <span class="old__price"><del>$362.00</del></span>
                                </div>
                                <span class="banner__content--style4__btn primary__btn">Shop now
                                    <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58746 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-30">
                    <div class="banner__items position__relative">
                        <a class="banner__thumbnail display-block" href="{{ route('shop.ecommerce') }}"><img class="banner__thumbnail--img" src="assets/img/banner/banner17.webp" alt="banner-img">
                            <div class="banner__content--style4">
                                <span class="banner__content--style4__subtitle">Starting at <span>$79.9</span></span>
                                <h2 class="banner__content--style4__title font__style"> <span>MOST</span> ESSENTIALS</h2>
                                <h3 class="banner__content--style4__title2 font__style2">SHOP AND SAVE BIG</h3>
                                <span class="banner__content--style4__btn primary__btn">Shop now
                                    <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58746 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner section -->

    <!-- Start categories section -->
    <section class="categories__section section--padding pt-0">
        <div class="container">
            <div class="section__heading border-bottom mb-30">
                <h2 class="section__heading--maintitle">Shop by <span>Categories</span></h2>
            </div>
            <div class="categories__inner--style3 d-flex">
                @foreach ($categories as $category)
                <div class="categories__card--style3 text-center">
                    <a class="categories__card--link" href="{{ route('shop.ecommerce', ['category' => $category->id]) }}">
                        <div class="categories__thumbnail">
                            <img class="categories__thumbnail--img"
                                src="{{ asset('storage/' . $category->image) }}"
                                alt="{{ $category->name }}"
                                style="width: 100px; height: 100px; object-fit: cover;">
                        </div>

                        <div class="categories__content style3">
                            <h2 class="categories__content--title">{{ $category->name }}</h2>
                            <span class="categories__content--subtitle">({{ $category->products->count() }} Items)</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End categories section -->


    <!-- Start deal of the day section -->
    @if($deals->isNotEmpty())
    <section class="product__section deal__section--bg section--padding mb-50">
        <div class="container">
            <div class="section__heading  border-bottom mb-30">
                <h2 class="section__heading--maintitle">Deal Of <span>The Day</span></h2>
            </div>
            <div class="product__section--inner">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="single__product--wrapper" style="height: 100%; padding-top: 60px">
                            @foreach($deals as $deal)
                            @php
                            $product = $deal->product;
                            $images = $product->images;
                            $averageRating = $product->reviews->avg('rating') ?? 0; // Calculate average rating or default to 0
                            @endphp
                            <div class="single__product--topbar d-flex align-items-center">
                                <div class="single__product--preview single__product--thumbnail__preview swiper">
                                    <div class="swiper-wrapper">
                                        @if($images)
                                        <div class="swiper-slide">
                                            <div class="single__product--thumbnail">
                                                <a class="single__product--thumbnail__link display-block" href="#">
                                                    <img class="single__product--thumbnail__img" src="{{ asset('storage/' . $images->front_img) }}" alt="{{ $product->name }}">
                                                </a>
                                                <span class="product__badge style__left">-{{ $deal->percentage }}%</span>
                                                @if($deal->startdate > now()->subDays(7))
                                                <span class="product__badge--new">New</span>
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="single__product--content">
                                    <ul class="rating product__card--rating d-flex">
                                        @for($i = 1; $i <= 5; $i++)
                                            <li class="rating__list">
                                            <span class="rating__icon">
                                                @if($averageRating >= $i)
                                                <!-- Full Star -->
                                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor" />
                                                </svg>
                                                @elseif($averageRating > $i - 1)
                                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.78906 1.25L5.07812 4.71875L1.25781 5.28125L4.02344 7.95312L3.36719 11.75L6.78906 9.96875V1.25Z" fill="currentColor" />
                                                    <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor" />
                                                </svg>
                                                @else
                                                <!-- Empty Star -->
                                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor" />
                                                </svg>
                                                @endif
                                            </span>
                                            </li>
                                            @endfor
                                            <li>
                                                <span class="rating__review--text">({{ $product->reviews->count() }} Review{{ $product->reviews->count() > 1 ? 's' : '' }})</span>
                                            </li>
                                    </ul>

                                    <h3 class="single__product--title h2">
                                        <a href="#">{{ $product->name }}</a>
                                    </h3>
                                    <div class="product__card--price">
                                        <span class="current__price">${{ number_format($product->price, 2) }}</span>
                                        <span class="old__price"><del>${{ number_format($product->original_price, 2) }}</del></span>
                                    </div>
                                    <div class="product__sold">
                                        <span class="product__sold--text">Available: <span class="product__sold--text__number">{{ $product->stock }}</span></span>
                                    </div>
                                    <div class="single__product--countdown d-flex" data-countdown="{{ $deal->enddate }}"></div>
                                    <ul class="single__product--action d-flex align-items-center">
                                        @php
                                        // Check if the product is already in the cart
                                        $isInCart = Auth::check() && Auth::user()->carts->contains('product_id', $product->id);
                                        @endphp

                                        <li class="single__product--action__list">
                                            <a class="single__product--cart__btn" href="{{ $isInCart ? route('cart.remove', ['product_id' => $product->id]) : route('cart.add', ['product_id' => $product->id]) }}" title="{{ $isInCart ? 'Remove from Cart' : 'Add to Cart' }}">
                                                {{ $isInCart ? 'Remove from Cart' : 'Add to Cart' }}
                                            </a>
                                        </li>

                                        @php
                                        $isInWishlist = Auth::check() && Auth::user()->wishlists->contains('product_id', $product->id);
                                        @endphp

                                        <li class="single__product--action__list">
                                            <a class="single__product--action__btn {{ $isInWishlist ? 'active' : '' }}" href="{{ $isInWishlist ? route('wishlist.remove', ['product_id' => $product->id]) : route('wishlist.add', ['product_id' => $product->id]) }}" title="{{ $isInWishlist ? 'Remove from Wishlist' : 'Add to Wishlist' }}">
                                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.8683 12.9208C7.76786 13.0212 7.64509 13.0714 7.5 13.0714C7.35491 13.0714 7.23214 13.0212 7.1317 12.9208L1.90848 7.8817C1.85268 7.83705 1.77455 7.76451 1.67411 7.66406C1.57924 7.56362 1.42578 7.38225 1.21373 7.11998C1.00167 6.85212 0.811942 6.57868 0.644531 6.29966C0.477121 6.02065 0.326451 5.68304 0.192522 5.28683C0.0641741 4.89062 0 4.50558 0 4.1317C0 2.90402 0.354353 1.9442 1.06306 1.25223C1.77176 0.560267 2.75112 0.214285 4.00112 0.214285C4.3471 0.214285 4.69866 0.275669 5.0558 0.398437C5.41853 0.515624 5.75335 0.677455 6.06027 0.883928C6.37277 1.08482 6.64063 1.27455 6.86384 1.45312C7.08705 1.6317 7.29911 1.82143 7.5 2.02232C7.70089 1.82143 7.91295 1.6317 8.13616 1.45312C8.35938 1.27455 8.62444 1.08482 8.93136 0.883928C9.24386 0.677455 9.57868 0.515624 9.93583 0.398437C10.2985 0.275669 10.6529 0.214285 10.9989 0.214285C12.2489 0.214285 13.2282 0.560267 13.9369 1.25223C14.6456 1.9442 15 2.90402 15 4.1317C15 5.36496 14.361 6.62054 13.0831 7.89844L7.8683 12.9208Z" fill="currentColor" />
                                                </svg>
                                                <span class="visually-hidden">Wishlist</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                            <div class="single__product--nav swiper">
                                <div class="swiper-wrapper">
                                    @php
                                    $imageFields = ['front_img', 'back_img', 'side_img'];
                                    @endphp
                                    @foreach($imageFields as $imageField)
                                    @if(!empty($images->$imageField))
                                    <div class="swiper-slide">
                                        <div class="single__product--nav__items">
                                            <img class="single__product--nav__thumbnail object-cover h-24 w-24" src="{{ asset('storage/' . $images->$imageField) }}" alt="product-nav-img">
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <div class="swiper__nav--btn swiper-button-next">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                                <div class="swiper__nav--btn swiper-button-prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-left">
                                        <polyline points="15 18 9 12 15 6"></polyline>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="banner__sidebar style5">
                            <div class="banner__items position__relative">
                                <a class="banner__thumbnail display-block" href="{{ route('shop.ecommerce') }}"><img class="banner__thumbnail--img" src="assets/img/banner/banner18.webp" alt="banner-img">
                                    <div class="banner__content--style5">
                                        <span class="banner__content--style5__subtitle text-white">From $540</span>
                                        <h2 class="banner__content--style5__title text-white">MEGA SALE</h2>
                                        <span class="banner__content--style5__btn">Shop now </span>
                                    </div>
                                </a>
                            </div>
                            <div class="banner__items position__relative">
                                <a class="banner__thumbnail display-block" href="{{ route('shop.ecommerce') }}"><img class="banner__thumbnail--img" src="assets/img/banner/banner19.webp" alt="banner-img">
                                    <div class="banner__content--style5 right">
                                        <span class="banner__content--style5__subtitle text__secondary">From $540</span>
                                        <h2 class="banner__content--style5__title text-white">MEGA SALE</h2>
                                        <span class="banner__content--style5__btn">Shop now </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- End deal of the day section -->

    <!-- Start product section -->
    <section class="product__section section--padding  pt-0">
        <div class="container">
            <div class="section__heading style2 text-center mb-30">
                <h2 class="section__heading--maintitle">Leatest Proaducts</h2>
                <ul class="nav tab__btn--wrapper product__tab--btn__style3 justify-content-center" role="tablist">
                    <li class="tab__btn--item" role="presentation">
                        <button class="tab__btn--link active" data-bs-toggle="tab" data-bs-target="#recent" type="button" role="tab" aria-selected="true"> Top Product
                        </button>
                    </li>
                    <li class="tab__btn--item" role="presentation">
                        <button class="tab__btn--link" data-bs-toggle="tab" data-bs-target="#bestseller" type="button" role="tab" aria-selected="false">
                            Hot Sale</button>
                    </li>
                    <li class="tab__btn--item" role="presentation">
                        <button class="tab__btn--link" data-bs-toggle="tab" data-bs-target="#top" type="button" role="tab" aria-selected="false">
                            New Arrival </button>
                    </li>
                    <li class="tab__btn--item" role="presentation">
                        <button class="tab__btn--link" data-bs-toggle="tab" data-bs-target="#new" type="button" role="tab" aria-selected="false">
                            On Sale Item</button>
                    </li>
                    <li class="tab__btn--item" role="presentation">
                        <button class="tab__btn--link" data-bs-toggle="tab" data-bs-target="#rating" type="button" role="tab" aria-selected="false">
                            Best Selling</button>
                    </li>
                </ul>
            </div>
            <div class="product__section--inner">
                <div class="tab-content" id="nav-tabContent">
                    <div id="recent" class="tab-pane fade show active" role="tabpanel">
                        <div class="product__wrapper">
                            <div class="row mb--n30">
                                @foreach($recentProducts as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-6 custom-col mb-30">
                                    <article class="product__card">
                                        <div class="product__card--thumbnail">
                                            <a class="product__card--thumbnail__link display-block" href="{{ route('product-details.ecommerce', $product->id) }}">
                                                <img class="product__card--thumbnail__img product__primary--img" src="{{ asset('storage/' . $product->images->front_img ?? 'assets/img/placeholder.webp') }}" alt="{{ $product->name }}">
                                                <img class="product__card--thumbnail__img product__secondary--img" src="{{ asset('storage/' . $product->images->back_img ?? 'assets/img/placeholder.webp') }}" alt="{{ $product->name }}">
                                            </a>
                                            {{-- Check if product has an active discount --}}
                                            @php
                                            $activeDiscount = $product->discounts->firstWhere('is_active', true);
                                            @endphp
                                            @if($activeDiscount)
                                            <span class="product__badge style__left">-{{ $activeDiscount->percentage }}%</span>
                                            @endif
                                            <ul class="product__card--action d-flex align-items-center justify-content-center">
                                                @php
                                                $isInWishlist = Auth::check() && Auth::user()->wishlists->contains('product_id', $product->id);
                                                @endphp

                                                <li class="product__card--action__list">
                                                    <a class="product__card--action__btn {{ $isInWishlist ? 'active' : '' }}" href="{{ $isInWishlist ? route('wishlist.remove', ['product_id' => $product->id]) : route('wishlist.add', ['product_id' => $product->id]) }}" title="{{ $isInWishlist ? 'Remove from Wishlist' : 'Add to Wishlist' }}">
                                                        <svg class="product__card--action__btn--svg" width="18" height="18" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z" fill="currentColor" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__card--content">
                                            @php
                                            $averageRating = $product->reviews->avg('rating') ?? 0; // Calculate average rating or default to 0
                                            @endphp
                                            <ul class="rating product__card--rating d-flex">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <li class="rating__list">
                                                    <span class="rating__icon">
                                                        @if($averageRating >= $i)
                                                        <!-- Full Star -->
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor" />
                                                        </svg>
                                                        @elseif($averageRating > $i - 1)
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.78906 1.25L5.07812 4.71875L1.25781 5.28125L4.02344 7.95312L3.36719 11.75L6.78906 9.96875V1.25Z" fill="currentColor" />
                                                            <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor" />
                                                        </svg>
                                                        @else
                                                        <!-- Empty Star -->
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor" />
                                                        </svg>
                                                        @endif
                                                    </span>
                                                    </li>
                                                    @endfor
                                                    <li>
                                                        <span class="rating__review--text">({{ $product->reviews->count() }} Review{{ $product->reviews->count() > 1 ? 's' : '' }})</span>
                                                    </li>
                                            </ul>
                                            <h3 class="product__card--title"><a href="{{ route('product-details.ecommerce', $product->id) }}">{{ $product->name }}</a></h3>
                                            <div class="product__card--price">
                                                @if($product->discounts->isNotEmpty() && $product->discounts->first()->is_active)
                                                @php
                                                $discount = $product->discounts->first(); // Assuming only one active discount
                                                $discountedPrice = $product->original_price - ($product->original_price * $discount->percentage / 100);
                                                @endphp
                                                <span class="current__price">${{ number_format($discountedPrice, 2) }}</span>
                                                <span class="old__price"><del>${{ number_format($product->original_price, 2) }}</del></span>
                                                @else
                                                <span class="current__price">${{ number_format($product->price, 2) }}</span>
                                                @endif
                                            </div>
                                            @php
                                            // Check if the product is already in the cart
                                            $isInCart = Auth::check() && Auth::user()->carts->contains('product_id', $product->id);
                                            @endphp

                                            <div class="product__card--footer">
                                                <a class="product__card--btn primary__btn" href="{{ $isInCart ? route('cart.remove', ['product_id' => $product->id]) : route('cart.add', ['product_id' => $product->id]) }}" title="{{ $isInCart ? 'Remove from Cart' : 'Add to Cart' }}">
                                                    <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625Z" fill="currentColor" />
                                                    </svg>
                                                    {{ $isInCart ? 'Remove from Cart' : 'Add to Cart' }}
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="bestseller" class="tab-pane fade" role="tabpanel">
                        <div class="product__wrapper">
                            <div class="row mb--n30">
                                @foreach($bestsellerProducts as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-6 custom-col mb-30">
                                    <article class="product__card">
                                        <div class="product__card--thumbnail">
                                            <a class="product__card--thumbnail__link display-block" href="{{ route('product-details.ecommerce', $product->id) }}">
                                                <img class="product__card--thumbnail__img product__primary--img" src="{{ asset('storage/' . $product->images->front_img ?? 'assets/img/placeholder.webp') }}" alt="{{ $product->name }}">
                                                <img class="product__card--thumbnail__img product__secondary--img" src="{{ asset('storage/' . $product->images->back_img ?? 'assets/img/placeholder.webp') }}" alt="{{ $product->name }}">
                                            </a>
                                            @if($product->discount)
                                            <span class="product__badge">-{{ $product->discount->percentage }}%</span>
                                            @endif
                                            <ul class="product__card--action d-flex align-items-center justify-content-center">
                                                @php
                                                $isInWishlist = Auth::check() && Auth::user()->wishlists->contains('product_id', $product->id);
                                                @endphp

                                                <li class="product__card--action__list">
                                                    <a class="product__card--action__btn {{ $isInWishlist ? 'active' : '' }}" href="{{ $isInWishlist ? route('wishlist.remove', ['product_id' => $product->id]) : route('wishlist.add', ['product_id' => $product->id]) }}" title="{{ $isInWishlist ? 'Remove from Wishlist' : 'Add to Wishlist' }}">
                                                        <svg class="product__card--action__btn--svg" width="18" height="18" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z" fill="currentColor" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__card--content">
                                            @php
                                            $averageRating = $product->reviews->avg('rating') ?? 0; // Calculate average rating or default to 0
                                            @endphp
                                            <ul class="rating product__card--rating d-flex">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <li class="rating__list">
                                                    <span class="rating__icon">
                                                        @if($averageRating >= $i)
                                                        <!-- Full Star -->
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor" />
                                                        </svg>
                                                        @elseif($averageRating > $i - 1)
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.78906 1.25L5.07812 4.71875L1.25781 5.28125L4.02344 7.95312L3.36719 11.75L6.78906 9.96875V1.25Z" fill="currentColor" />
                                                            <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor" />
                                                        </svg>
                                                        @else
                                                        <!-- Empty Star -->
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor" />
                                                        </svg>
                                                        @endif
                                                    </span>
                                                    </li>
                                                    @endfor
                                                    <li>
                                                        <span class="rating__review--text">({{ $product->reviews->count() }} Review{{ $product->reviews->count() > 1 ? 's' : '' }})</span>
                                                    </li>
                                            </ul>
                                            <h3 class="product__card--title"><a href="{{ route('product-details.ecommerce', $product->id) }}">{{ $product->name }}</a></h3>
                                            <div class="product__card--price">
                                                @if($product->discounts->isNotEmpty() && $product->discounts->first()->is_active)
                                                @php
                                                $discount = $product->discounts->first(); // Assuming only one active discount
                                                $discountedPrice = $product->original_price - ($product->original_price * $discount->percentage / 100);
                                                @endphp
                                                <span class="current__price">${{ number_format($discountedPrice, 2) }}</span>
                                                <span class="old__price"><del>${{ number_format($product->original_price, 2) }}</del></span>
                                                @else
                                                <span class="current__price">${{ number_format($product->price, 2) }}</span>
                                                @endif
                                            </div>
                                            <div class="product__card--footer">
                                                @php
                                                // Check if the product is already in the cart
                                                $isInCart = Auth::check() && Auth::user()->carts->contains('product_id', $product->id);
                                                @endphp

                                                <div class="product__card--footer">
                                                    <a class="product__card--btn primary__btn" href="{{ $isInCart ? route('cart.remove', ['product_id' => $product->id]) : route('cart.add', ['product_id' => $product->id]) }}" title="{{ $isInCart ? 'Remove from Cart' : 'Add to Cart' }}">
                                                        <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625Z" fill="currentColor" />
                                                        </svg>
                                                        {{ $isInCart ? 'Remove from Cart' : 'Add to Cart' }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="top" class="tab-pane fade" role="tabpanel">
                        <div class="product__wrapper">
                            <div class="row mb--n30">
                                @foreach($topProducts as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-6 custom-col mb-30">
                                    <article class="product__card">
                                        <div class="product__card--thumbnail">
                                            <a class="product__card--thumbnail__link display-block" href="{{ route('product-details.ecommerce', $product->id) }}">
                                                <img class="product__card--thumbnail__img product__primary--img" src="{{ asset('storage/' . $product->images->front_img ?? 'assets/img/placeholder.webp') }}" alt="{{ $product->name }}">
                                                <img class="product__card--thumbnail__img product__secondary--img" src="{{ asset('storage/' . $product->images->back_img ?? 'assets/img/placeholder.webp') }}" alt="{{ $product->name }}">
                                            </a>
                                            @if($product->discount)
                                            <span class="product__badge">-{{ $product->discount->percentage }}%</span>
                                            @endif
                                            <ul class="product__card--action d-flex align-items-center justify-content-center">
                                                @php
                                                $isInWishlist = Auth::check() && Auth::user()->wishlists->contains('product_id', $product->id);
                                                @endphp

                                                <li class="product__card--action__list">
                                                    <a class="product__card--action__btn {{ $isInWishlist ? 'active' : '' }}" href="{{ $isInWishlist ? route('wishlist.remove', ['product_id' => $product->id]) : route('wishlist.add', ['product_id' => $product->id]) }}" title="{{ $isInWishlist ? 'Remove from Wishlist' : 'Add to Wishlist' }}">
                                                        <svg class="product__card--action__btn--svg" width="18" height="18" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z" fill="currentColor" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__card--content">
                                            @php
                                            $averageRating = $product->reviews->avg('rating') ?? 0; // Calculate average rating or default to 0
                                            @endphp
                                            <ul class="rating product__card--rating d-flex">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <li class="rating__list">
                                                    <span class="rating__icon">
                                                        @if($averageRating >= $i)
                                                        <!-- Full Star -->
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor" />
                                                        </svg>
                                                        @elseif($averageRating > $i - 1)
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.78906 1.25L5.07812 4.71875L1.25781 5.28125L4.02344 7.95312L3.36719 11.75L6.78906 9.96875V1.25Z" fill="currentColor" />
                                                            <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor" />
                                                        </svg>
                                                        @else
                                                        <!-- Empty Star -->
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor" />
                                                        </svg>
                                                        @endif
                                                    </span>
                                                    </li>
                                                    @endfor
                                                    <li>
                                                        <span class="rating__review--text">({{ $product->reviews->count() }} Review{{ $product->reviews->count() > 1 ? 's' : '' }})</span>
                                                    </li>
                                            </ul>
                                            <h3 class="product__card--title"><a href="{{ route('product-details.ecommerce', $product->id) }}">{{ $product->name }}</a></h3>
                                            <div class="product__card--price">
                                                @if($product->discounts->isNotEmpty() && $product->discounts->first()->is_active)
                                                @php
                                                $discount = $product->discounts->first(); // Assuming only one active discount
                                                $discountedPrice = $product->original_price - ($product->original_price * $discount->percentage / 100);
                                                @endphp
                                                <span class="current__price">${{ number_format($discountedPrice, 2) }}</span>
                                                <span class="old__price"><del>${{ number_format($product->original_price, 2) }}</del></span>
                                                @else
                                                <span class="current__price">${{ number_format($product->price, 2) }}</span>
                                                @endif
                                            </div>
                                            <div class="product__card--footer">
                                                @php
                                                // Check if the product is already in the cart
                                                $isInCart = Auth::check() && Auth::user()->carts->contains('product_id', $product->id);
                                                @endphp

                                                <div class="product__card--footer">
                                                    <a class="product__card--btn primary__btn" href="{{ $isInCart ? route('cart.remove', ['product_id' => $product->id]) : route('cart.add', ['product_id' => $product->id]) }}" title="{{ $isInCart ? 'Remove from Cart' : 'Add to Cart' }}">
                                                        <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625Z" fill="currentColor" />
                                                        </svg>
                                                        {{ $isInCart ? 'Remove from Cart' : 'Add to Cart' }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="new" class="tab-pane fade" role="tabpanel">
                        <div class="product__wrapper">
                            <div class="row mb--n30">
                                @foreach($newProducts as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-6 custom-col mb-30">
                                    <article class="product__card">
                                        <div class="product__card--thumbnail">
                                            <a class="product__card--thumbnail__link display-block" href="{{ route('product-details.ecommerce', $product->id) }}">
                                                <img class="product__card--thumbnail__img product__primary--img" src="{{ asset('storage/' . $product->images->front_img ?? 'assets/img/placeholder.webp') }}" alt="{{ $product->name }}">
                                                <img class="product__card--thumbnail__img product__secondary--img" src="{{ asset('storage/' . $product->images->back_img ?? 'assets/img/placeholder.webp') }}" alt="{{ $product->name }}">
                                            </a>
                                            @if($product->discount)
                                            <span class="product__badge">-{{ $product->discount->percentage }}%</span>
                                            @endif
                                            <ul class="product__card--action d-flex align-items-center justify-content-center">
                                                @php
                                                $isInWishlist = Auth::check() && Auth::user()->wishlists->contains('product_id', $product->id);
                                                @endphp

                                                <li class="product__card--action__list">
                                                    <a class="product__card--action__btn {{ $isInWishlist ? 'active' : '' }}" href="{{ $isInWishlist ? route('wishlist.remove', ['product_id' => $product->id]) : route('wishlist.add', ['product_id' => $product->id]) }}" title="{{ $isInWishlist ? 'Remove from Wishlist' : 'Add to Wishlist' }}">
                                                        <svg class="product__card--action__btn--svg" width="18" height="18" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z" fill="currentColor" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__card--content">
                                            @php
                                            $averageRating = $product->reviews->avg('rating') ?? 0; // Calculate average rating or default to 0
                                            @endphp
                                            <ul class="rating product__card--rating d-flex">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <li class="rating__list">
                                                    <span class="rating__icon">
                                                        @if($averageRating >= $i)
                                                        <!-- Full Star -->
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor" />
                                                        </svg>
                                                        @elseif($averageRating > $i - 1)
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.78906 1.25L5.07812 4.71875L1.25781 5.28125L4.02344 7.95312L3.36719 11.75L6.78906 9.96875V1.25Z" fill="currentColor" />
                                                            <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor" />
                                                        </svg>
                                                        @else
                                                        <!-- Empty Star -->
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor" />
                                                        </svg>
                                                        @endif
                                                    </span>
                                                    </li>
                                                    @endfor
                                                    <li>
                                                        <span class="rating__review--text">({{ $product->reviews->count() }} Review{{ $product->reviews->count() > 1 ? 's' : '' }})</span>
                                                    </li>
                                            </ul>
                                            <h3 class="product__card--title"><a href="{{ route('product-details.ecommerce', $product->id) }}">{{ $product->name }}</a></h3>
                                            <div class="product__card--price">
                                                @if($product->discounts->isNotEmpty() && $product->discounts->first()->is_active)
                                                @php
                                                $discount = $product->discounts->first(); // Assuming only one active discount
                                                $discountedPrice = $product->original_price - ($product->original_price * $discount->percentage / 100);
                                                @endphp
                                                <span class="current__price">${{ number_format($discountedPrice, 2) }}</span>
                                                <span class="old__price"><del>${{ number_format($product->original_price, 2) }}</del></span>
                                                @else
                                                <span class="current__price">${{ number_format($product->price, 2) }}</span>
                                                @endif
                                            </div>
                                            <div class="product__card--footer">
                                                @php
                                                // Check if the product is already in the cart
                                                $isInCart = Auth::check() && Auth::user()->carts->contains('product_id', $product->id);
                                                @endphp

                                                <div class="product__card--footer">
                                                    <a class="product__card--btn primary__btn" href="{{ $isInCart ? route('cart.remove', ['product_id' => $product->id]) : route('cart.add', ['product_id' => $product->id]) }}" title="{{ $isInCart ? 'Remove from Cart' : 'Add to Cart' }}">
                                                        <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625Z" fill="currentColor" />
                                                        </svg>
                                                        {{ $isInCart ? 'Remove from Cart' : 'Add to Cart' }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="rating" class="tab-pane fade" role="tabpanel">
                        <div class="product__wrapper">
                            <div class="row mb--n30">
                                @foreach($sortedProducts as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-6 custom-col mb-30">
                                    <article class="product__card">
                                        <div class="product__card--thumbnail">
                                            <a class="product__card--thumbnail__link display-block" href="{{ route('product-details.ecommerce', $product->id) }}">
                                                <img class="product__card--thumbnail__img product__primary--img" src="{{ asset('storage/' . $product->images->front_img ?? 'assets/img/placeholder.webp') }}" alt="{{ $product->name }}">
                                                <img class="product__card--thumbnail__img product__secondary--img" src="{{ asset('storage/' . $product->images->back_img ?? 'assets/img/placeholder.webp') }}" alt="{{ $product->name }}">
                                            </a>
                                            @if($product->discount)
                                            <span class="product__badge">-{{ $product->discount->percentage }}%</span>
                                            @endif
                                            <ul class="product__card--action d-flex align-items-center justify-content-center">
                                                @php
                                                $isInWishlist = Auth::check() && Auth::user()->wishlists->contains('product_id', $product->id);
                                                @endphp

                                                <li class="product__card--action__list">
                                                    <a class="product__card--action__btn {{ $isInWishlist ? 'active' : '' }}" href="{{ $isInWishlist ? route('wishlist.remove', ['product_id' => $product->id]) : route('wishlist.add', ['product_id' => $product->id]) }}" title="{{ $isInWishlist ? 'Remove from Wishlist' : 'Add to Wishlist' }}">
                                                        <svg class="product__card--action__btn--svg" width="18" height="18" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z" fill="currentColor" />
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__card--content">
                                            @php
                                            $averageRating = $product->reviews->avg('rating') ?? 0; // Calculate average rating or default to 0
                                            @endphp
                                            <ul class="rating product__card--rating d-flex">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <li class="rating__list">
                                                    <span class="rating__icon">
                                                        @if($averageRating >= $i)
                                                        <!-- Full Star -->
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor" />
                                                        </svg>
                                                        @elseif($averageRating > $i - 1)
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.78906 1.25L5.07812 4.71875L1.25781 5.28125L4.02344 7.95312L3.36719 11.75L6.78906 9.96875V1.25Z" fill="currentColor" />
                                                            <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor" />
                                                        </svg>
                                                        @else
                                                        <!-- Empty Star -->
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor" />
                                                        </svg>
                                                        @endif
                                                    </span>
                                                    </li>
                                                    @endfor
                                                    <li>
                                                        <span class="rating__review--text">({{ $product->reviews->count() }} Review{{ $product->reviews->count() > 1 ? 's' : '' }})</span>
                                                    </li>
                                            </ul>
                                            <h3 class="product__card--title"><a href="{{ route('product-details.ecommerce', $product->id) }}">{{ $product->name }}</a></h3>
                                            <div class="product__card--price">
                                                @if($product->discounts->isNotEmpty() && $product->discounts->first()->is_active)
                                                @php
                                                $discount = $product->discounts->first(); // Assuming only one active discount
                                                $discountedPrice = $product->original_price - ($product->original_price * $discount->percentage / 100);
                                                @endphp
                                                <span class="current__price">${{ number_format($discountedPrice, 2) }}</span>
                                                <span class="old__price"><del>${{ number_format($product->original_price, 2) }}</del></span>
                                                @else
                                                <span class="current__price">${{ number_format($product->price, 2) }}</span>
                                                @endif
                                            </div>
                                            <div class="product__card--footer">
                                                @php
                                                // Check if the product is already in the cart
                                                $isInCart = Auth::check() && Auth::user()->carts->contains('product_id', $product->id);
                                                @endphp

                                                <div class="product__card--footer">
                                                    <a class="product__card--btn primary__btn" href="{{ $isInCart ? route('cart.remove', ['product_id' => $product->id]) : route('cart.add', ['product_id' => $product->id]) }}" title="{{ $isInCart ? 'Remove from Cart' : 'Add to Cart' }}">
                                                        <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625Z" fill="currentColor" />
                                                        </svg>
                                                        {{ $isInCart ? 'Remove from Cart' : 'Add to Cart' }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End product section -->

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


    <script>
        document.querySelectorAll("[data-countdown]").forEach(function(elem) {
            const countDownItem = function(value, label) {
                    return `<div class="countdown__item" ${label}"><span class="countdown__number">${value}</span><p class="countdown__text">${label}</p></div>`;
                },
                date = new Date(elem.getAttribute("data-countdown")).getTime(),
                second = 1e3,
                minute = 6e4,
                hour = 36e5,
                day = 864e5,
                countDownInterval = setInterval(function() {
                    let currentTime = new Date().getTime(),
                        timeDistance = date - currentTime,
                        daysValue = Math.floor(timeDistance / day),
                        hoursValue = Math.floor((timeDistance % day) / 36e5),
                        minutesValue = Math.floor((timeDistance % 36e5) / 6e4),
                        secondsValue = Math.floor((timeDistance % 6e4) / 1e3);
                    (elem.innerHTML =
                        countDownItem(daysValue, "days") +
                        countDownItem(hoursValue, "hrs") +
                        countDownItem(minutesValue, "mins") +
                        countDownItem(secondsValue, "secs")),
                    timeDistance < 0 && clearInterval(countDownInterval);
                }, 1e3);
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all thumbnail images
            const thumbnails = document.querySelectorAll('.single__product--nav__thumbnail');
            // Select the main product image
            const mainImage = document.querySelector('.single__product--thumbnail__img');

            // Add click event to each thumbnail
            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    // Set main image src to the clicked thumbnail's src
                    mainImage.src = this.src;
                });
            });
        });
    </script>

</x-ecommerce-app-layout>