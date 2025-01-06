<x-ecommerce-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('About Us') }}
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
                            <li class="breadcrumb__content--menu__items"><span>About Us</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start about section -->
    <section class="about__section section--padding mb-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about__thumb d-flex">
                        <div class="about__thumb--items">
                            <img class="about__thumb--img border-radius-5" src="assets/img/other/about-thumb-list1.webp" alt="about-thumb">
                        </div>
                        <div class="about__thumb--items position__relative">
                            <img class="about__thumb--img border-radius-5" src="assets/img/other/about-thumb-list2.webp" alt="about-thumb">
                            <div class="banner__bideo--play about__thumb--play">
                                <a class="banner__bideo--play__icon about__thumb--play__icon glightbox" href="https://vimeo.com/115041822" data-gallery="video">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 31 37">
                                        <path id="Polygon_1" data-name="Polygon 1" d="M16.783,2.878a2,2,0,0,1,3.435,0l14.977,25.1A2,2,0,0,1,33.477,31H3.523a2,2,0,0,1-1.717-3.025Z" transform="translate(31) rotate(90)" fill="currentColor" />
                                    </svg>
                                    <span class="visually-hidden">bideo play</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__content">
                        <span class="about__content--subtitle text__secondary mb-20"> Why Choose us</span>
                        <h2 class="about__content--maintitle mb-25">We do not buy from the open market & traders.</h2>
                        <p class="about__content--desc mb-20">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit illo, est repellendus are quia voluptate neque reiciendis ea placeat labore maiores cum, hic ducimus ad a dolorem soluta consectetur adipisci. Perspiciatis quas ab quibusdam is.</p>
                        <p class="about__content--desc mb-25">Itaque accusantium eveniet a laboriosam dolorem? Magni suscipit est corrupti explicabo non perspiciatis, excepturi ut asperiores assumenda rerum? Provident ab corrupti sequi, voluptates repudiandae eius odit aut.</p>
                        <div class="about__author position__relative">
                            <h3 class="about__author--name h4">Bruce Sutton</h3>
                            <span class="about__author--rank">Spa Manager</span>
                            <img class="about__author--signature" src="assets/img/icon/signature.webp" alt="signature">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End about section -->
     
</x-ecommerce-app-layout>