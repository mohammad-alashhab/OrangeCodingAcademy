<x-ecommerce-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Frequently Asked Questions') }}
        </h2>
    </x-slot>

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a href="index-2.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span>Frequently</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- faq page section start -->
    <section class="faq__section section--padding">
        <div class="container">
            <div class="faq__section--inner">
                <div class="face__step one border-bottom" id="accordionExample">
                    <h2 class="face__step--title h3 mb-30">Shipping Information</h2>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="accordion__container">
                                <div class="accordion__items">
                                    <h3 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">What Shipping Methods Are Available?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                                <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </h3>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h3 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">How Long Will it Take To Get My Package??
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                                <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </h3>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h3 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">What payment types can I use?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                                <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </h3>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="accordion__container">
                                <div class="accordion__items">
                                    <h3 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">Do you ship internationally??
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                                <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </h3>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h3 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">How will my parcel be delivered?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                                <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </h3>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h3 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">How do I know if something is organic?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                                <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </h3>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="face__step one border-bottom" id="accordionExample2">
                    <h2 class="face__step--title h3 mb-30">Payment Information</h2>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="accordion__container">
                                <div class="accordion__items">
                                    <h3 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">What payment types can I use?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                                <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </h3>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h3 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">Can I pay by Gift Card?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                                <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </h3>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h3 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">can't make a payment
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                                <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </h3>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="accordion__container">
                                <div class="accordion__items">
                                    <h3 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">Has my payment gone through?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                                <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </h3>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h3 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">Tracking my order
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                                <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </h3>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h3 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">Haven’t received my order
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                                <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </h3>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="face__step one" id="accordionExample3">
                    <h2 class="face__step--title h3 mb-30">Orders and Returns</h2>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="accordion__container">
                                <div class="accordion__items">
                                    <h3 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">How can I return an item?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                                <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </h3>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h3 class=" accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">What Shipping Methods Are Available?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                                <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </h3>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h3 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">How can i make refund from your website?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                                <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </h3>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="accordion__container">
                                <div class="accordion__items">
                                    <h3 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">I am a new user. How should I start?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                                <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </h3>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h3 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">What payment methods are accepted?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                                <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </h3>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h3 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">Do you ship internationally?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512">
                                                <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </h3>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq page section end -->

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