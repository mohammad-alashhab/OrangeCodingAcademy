<x-ecommerce-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Shop Grid') }}
        </h2>
    </x-slot>

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title">Product</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a href="index-2.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span>Product</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start shop section -->
    <div class="shop__section section--padding">
        <div class="container">
            <div class="shop__product--wrapper">
                <div class="shop__header d-flex align-items-center justify-content-between mb-30">
                    <div class="product__view--mode d-flex align-items-center">
                        <div class="product__view--mode__list product__short--by align-items-center d-flex">
                            <form action="{{ route('shop.ecommerce') }}" method="GET" id="filterForm" class="d-flex justify-content-center align-items-center">
                                <label class="product__view--label">Filter</label>
                                <div class="select shop__header--select">
                                    <select class="product__view--select" name="sort" onchange="document.getElementById('filterForm').submit()">
                                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Sort by latest</option>
                                        <option value="newness" {{ request('sort') == 'newness' ? 'selected' : '' }}>Sort by newness</option>
                                        <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Sort by rating</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="product__view--mode__list product__short--by align-items-center d-flex">
                            <form action="{{ route('shop.ecommerce') }}" method="GET" id="categoryFilterForm" class="d-flex justify-content-center align-items-center">
                                <label class="product__view--label">Category</label>
                                <div class="select shop__header--select">
                                    <select class="product__view--select" name="category" onchange="document.getElementById('categoryFilterForm').submit()">
                                        <option value="">All Categories</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $categoryId == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Hidden input to retain the sort parameter -->
                                <input type="hidden" name="sort" value="{{ $sort }}">
                            </form>
                        </div>
                        <div class="product__view--mode__list">
                            <div class="product__tab--one product__grid--column__buttons d-flex justify-content-center">
                                <button class="product__grid--column__buttons--icons active" aria-label="grid btn" data-toggle="tab" data-target="#product_grid">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 9 9">
                                        <g transform="translate(-1360 -479)">
                                            <rect id="Rectangle_5725" data-name="Rectangle 5725" width="4" height="4" transform="translate(1360 479)" fill="currentColor" />
                                            <rect id="Rectangle_5727" data-name="Rectangle 5727" width="4" height="4" transform="translate(1360 484)" fill="currentColor" />
                                            <rect id="Rectangle_5726" data-name="Rectangle 5726" width="4" height="4" transform="translate(1365 479)" fill="currentColor" />
                                            <rect id="Rectangle_5728" data-name="Rectangle 5728" width="4" height="4" transform="translate(1365 484)" fill="currentColor" />
                                        </g>
                                    </svg>
                                </button>
                                <button class="product__grid--column__buttons--icons" aria-label="list btn" data-toggle="tab" data-target="#product_list">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 13 8">
                                        <g id="Group_14700" data-name="Group 14700" transform="translate(-1376 -478)">
                                            <g transform="translate(12 -2)">
                                                <g id="Group_1326" data-name="Group 1326">
                                                    <rect id="Rectangle_5729" data-name="Rectangle 5729" width="3" height="2" transform="translate(1364 483)" fill="currentColor" />
                                                    <rect id="Rectangle_5730" data-name="Rectangle 5730" width="9" height="2" transform="translate(1368 483)" fill="currentColor" />
                                                </g>
                                                <g id="Group_1328" data-name="Group 1328" transform="translate(0 -3)">
                                                    <rect id="Rectangle_5729-2" data-name="Rectangle 5729" width="3" height="2" transform="translate(1364 483)" fill="currentColor" />
                                                    <rect id="Rectangle_5730-2" data-name="Rectangle 5730" width="9" height="2" transform="translate(1368 483)" fill="currentColor" />
                                                </g>
                                                <g id="Group_1327" data-name="Group 1327" transform="translate(0 -1)">
                                                    <rect id="Rectangle_5731" data-name="Rectangle 5731" width="3" height="2" transform="translate(1364 487)" fill="currentColor" />
                                                    <rect id="Rectangle_5732" data-name="Rectangle 5732" width="9" height="2" transform="translate(1368 487)" fill="currentColor" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <p class="product__showing--count">
                        Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} results
                    </p>
                </div>
                <div class="tab_content">
                    <div id="product_grid" class="tab_pane active show">
                        <div class="product__section--inner">
                            <div class="row mb--n30">
                                @foreach($products as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-6 custom-col mb-30">
                                    <article class="product__card">
                                        <div class="product__card--thumbnail">
                                            <a class="product__card--thumbnail__link display-block" href="{{ route('product-details.ecommerce', $product->id) }}">
                                                <img class="product__card--thumbnail__img product__primary--img" src="{{ asset('storage/' .$product->images->front_img) }}" alt="{{ $product->name }}">
                                                <img class="product__card--thumbnail__img product__secondary--img" src="{{ asset('storage/' .$product->images->back_img) }}" alt="{{ $product->name }}">
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
                                            <div class=" product__card--price">
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
                    <div id="product_list" class="tab_pane">
                        <div class="product__section--inner product__section--style3__inner">
                            <div class="row row-cols-1 mb--n30">
                                @foreach($products as $product)
                                <div class="col mb-30">
                                    <div class="product__card product__list d-flex align-items-center">
                                        <div class="product__card--thumbnail product__list--thumbnail">
                                            <a class="product__card--thumbnail__link display-block" href="{{ route('product-details.ecommerce', $product->id) }}">
                                                <img class="product__card--thumbnail__img product__primary--img" src="{{ asset('storage/' .$product->images->front_img) }}" alt="{{ $product->name }}">
                                                <img class="product__card--thumbnail__img product__secondary--img" src="{{ asset('storage/' .$product->images->back_img) }}" alt="{{ $product->name }}">
                                            </a>
                                            {{-- Check if product has an active discount --}}
                                            @php
                                            $activeDiscount = $product->discounts->firstWhere('is_active', true);
                                            @endphp
                                            @if($activeDiscount)
                                            <span class="product__badge">-{{ $activeDiscount->percentage }}%</span>
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
                                        <div class="product__card--content product__list--content">
                                            <h3 class="product__card--title"><a href="{{ route('product-details.ecommerce', $product->id) }}">{{ $product->name }}</a></h3>
                                            <ul class="rating product__card--rating d-flex">
                                                @php
                                                $averageRating = $product->reviews->avg('rating') ?? 0;
                                                @endphp
                                                @for($i = 1; $i <= 5; $i++)
                                                    <li class="rating__list">
                                                    <span class="rating__icon">
                                                        @if($averageRating >= $i)
                                                        <!-- Full Star -->
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor" />
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
                                            <div class="product__list--price">
                                                @if($product->discounts->isNotEmpty() && $product->discounts->first()->is_active)
                                                @php
                                                $discount = $product->discounts->first();
                                                $discountedPrice = $product->original_price - ($product->original_price * $discount->percentage / 100);
                                                @endphp
                                                <span class="current__price">${{ number_format($discountedPrice, 2) }}</span>
                                                <span class="old__price"><del>${{ number_format($product->original_price, 2) }}</del></span>
                                                @else
                                                <span class="current__price">${{ number_format($product->price, 2) }}</span>
                                                @endif
                                            </div>
                                            <p class="product__card--content__desc mb-20">{{ $product->description }}</p>
                                            <a class="product__card--btn primary__btn" href="cart.html">+ Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagination__area">
                    <nav class="pagination justify-content-center">
                        <ul class="pagination__wrapper d-flex align-items-center justify-content-center">
                            <!-- Previous Page Link -->
                            @if ($products->onFirstPage())
                            <li class="pagination__list disabled">
                                <span class="pagination__item--arrow link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
                                    </svg>
                                    <span class="visually-hidden">page left arrow</span>
                                </span>
                            </li>
                            @else
                            <li class="pagination__list">
                                <a href="{{ $products->appends(['category' => $categoryId, 'sort' => $sort])->previousPageUrl() }}" class="pagination__item--arrow link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
                                    </svg>
                                    <span class="visually-hidden">page left arrow</span>
                                </a>
                            </li>
                            @endif

                            <!-- Pagination Elements -->
                            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            @if ($page == $products->currentPage())
                            <li class="pagination__list">
                                <span class="pagination__item pagination__item--current">{{ $page }}</span>
                            </li>
                            @else
                            <li class="pagination__list">
                                <a href="{{ $products->appends(['category' => $categoryId, 'sort' => $sort])->url($page) }}" class="pagination__item link">{{ $page }}</a>
                            </li>
                            @endif
                            @endforeach

                            <!-- Next Page Link -->
                            @if ($products->hasMorePages())
                            <li class="pagination__list">
                                <a href="{{ $products->appends(['category' => $categoryId, 'sort' => $sort])->nextPageUrl() }}" class="pagination__item--arrow link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100" />
                                    </svg>
                                    <span class="visually-hidden">page right arrow</span>
                                </a>
                            </li>
                            @else
                            <li class="pagination__list disabled">
                                <span class="pagination__item--arrow link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100" />
                                    </svg>
                                    <span class="visually-hidden">page right arrow</span>
                                </span>
                            </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End shop section -->

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

</x-ecommerce-app-layout>