<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ecommerce') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css" />
    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-duotone-solid.css" />
    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-thin.css" />
    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-solid.css" />
    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-regular.css" />
    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-light.css" />

    <!-- In your head section or before closing body tag -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.7/dist/cdn.min.js"></script>


    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets')}}/img/favicon.ico">

    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/plugins/glightbox.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500&amp;display=swap" rel="stylesheet">

    <!-- Plugin css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/vendor/bootstrap.min.css">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">

</head>

<body class="font-sans antialiased">
    <div class="flex">
        <!-- Main Content -->
        <div id="main-content" class="flex-1 min-h-screen bg-gray-100 dark:bg-gray-900 transition-all duration-300">
            <!-- Navigation -->
            @include('layouts.ecommerce.navigation')
            <!-- Page Content -->
            <main>
                <!-- Loading -->
                @include('layouts.ecommerce.loading')
                {{ $slot }}
            </main>
            <!-- Footer -->
            @include('layouts.ecommerce.footer')
        </div>
    </div>

    <!-- QuickView Wrapper -->
    @include('layouts.ecommerce.quick-wrapper')

    <!-- Back to top button -->
    @include('layouts.ecommerce.back-to-top')

    <!-- All Script JS Plugins here  -->
    <script src="{{asset('assets')}}/js/vendor/popper.js" defer="defer"></script>
    <script src="{{asset('assets')}}/js/vendor/bootstrap.min.js" defer="defer"></script>
    <script src="{{asset('assets')}}/js/plugins/swiper-bundle.min.js"></script>
    <script src="{{asset('assets')}}/js/plugins/glightbox.min.js"></script>

    <!-- Customscript js -->
    <script src="{{asset('assets')}}/js/script.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quickViewButtons = document.querySelectorAll('.quickview-btn');

            quickViewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');

                    // Fetch product details via AJAX
                    fetch(`/product/${productId}/details`)
                        .then(response => response.json())
                        .then(data => {
                            const product = data.product;
                            const averageRating = data.averageRating;
                            const reviewCount = data.reviewCount;

                            // Update modal content
                            document.querySelector('#examplemodal .product__details--info__title').textContent = product.name;
                            document.querySelector('#examplemodal .current__price').textContent = `$${product.price}`;
                            document.querySelector('#examplemodal .old__price-del').textContent = `$${product.original_price}`;
                            document.querySelector('#examplemodal .product__details--info__desc').textContent = product.description;

                            // Update rating stars
                            const ratingStars = document.querySelectorAll('#examplemodal .rating__icon');
                            ratingStars.forEach((star, index) => {
                                if (index < Math.floor(averageRating)) {
                                    star.innerHTML = `
                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"></path>
                                </svg>
                            `;
                                } else {
                                    star.innerHTML = `
                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor"></path>
                                </svg>
                            `;
                                }
                            });

                            // Update review count
                            document.querySelector('#examplemodal .rating__review--text').textContent = `(${reviewCount}) Review`;

                            // Update images
                            const imageGallery = document.querySelector('#examplemodal .swiper-wrapper');
                            imageGallery.innerHTML = ''; // Clear existing images

                            if (product.images) {
                                const images = [
                                    product.images.front_img,
                                    product.images.back_img,
                                    product.images.side_img,
                                ];

                                images.forEach(image => {
                                    if (image) {
                                        const imagePath = `storage/${image}`; // Prepend 'storage/' to the image path
                                        imageGallery.innerHTML += `
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="${imagePath}">
                                                <img class="product__media--preview__items--img" src="${imagePath}" alt="product-media-img">
                                            </a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="${imagePath}" data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512">
                                                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                                    </svg>
                                                    <span class="visually-hidden">product view</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                    }
                                });
                            }
                        })
                        .catch(error => console.error('Error fetching product details:', error));
                });
            });
        });
    </script>

</body>

</html>