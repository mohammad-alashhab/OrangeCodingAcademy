<!-- Quickview Wrapper -->
<div class="modal fade" id="examplemodal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog quickview__main--wrapper modal-dialog-centered">
        <div class="modal-content quickview__main__content">
            <div class="modal-header quickview_m_header">
                <button type="button" class="btn-close quickview__close--btn" data-bs-dismiss="modal" aria-label="Close">✕</button>
            </div>
            <div class="modal-body quickview__inner">
                <div class="row row-cols-lg-2 row-cols-md-2">
                    <div class="col">
                        <div class="quickview__gallery">
                            <div class="product__media--preview swiper">
                                <div class="swiper-wrapper">
                                    <!-- Dynamic images will be inserted here -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex align-items-center">
                        <div class="quickview__info">
                            <form action="#">
                                <h2 class="product__details--info__title mb-15"></h2>
                                <div class="product__card--price mb-15">
                                    <span class="current__price"></span>
                                    <span class="old__price"><del class="old__price-del"></del></span>
                                </div>
                                <ul class="rating product__card--rating mb-20 d-flex">
                                    <!-- Dynamic rating stars will be inserted here -->
                                    <li class="rating__list">
                                        <span class="rating__icon"></span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon"></span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon"></span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon"></span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon"></span>
                                    </li>
                                    <li>
                                        <span class="rating__review--text"></span>
                                    </li>
                                </ul>
                                <p class="product__details--info__desc mb-15"></p>
                                <div class="product__variant">
                                    <div class="quickview__variant--list quantity d-flex align-items-center mb-15">
                                        <div class="quantity__box">
                                            <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                            <label>
                                                <input type="number" class="quantity__number quickview__value--number" value="1" data-counter />
                                            </label>
                                            <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                                        </div>
                                        <button class="primary__btn quickview__cart--btn" type="submit">Add To Cart</button>
                                    </div>
                                    <div class="quickview__variant--list variant__wishlist mb-15">
                                        <a class="variant__wishlist--icon" href="wishlist.html" title="Add to wishlist">
                                            <svg class="quickview__variant--wishlist__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="32" />
                                            </svg>
                                            Add to Wishlist
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quickview Wrapper End -->