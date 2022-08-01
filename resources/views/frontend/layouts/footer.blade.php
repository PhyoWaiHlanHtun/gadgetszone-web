<div class="footer-area">
    <div class="footer-container">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <!-- Start single blog -->
                    <div class="col-md-6 col-lg-3 mb-md-30px mb-lm-30px">
                        <div class="single-wedge">
                            <div class="footer-logo">
                                <a href="/"><img src="{{ asset('assets/images/logo/logo3.png') }}" alt="logo" width="150"></a>
                            </div>
                            <p class="about-text">
                                Gadgets Zone  {{ __('frontend.footer_text') }}
                            </p>
                            <ul class="link-follow">
                                <li>
                                    <a class="m-0" title="Facebook" rel="noopener noreferrer" href="#" target="_blank"><i class="fa fa-facebook"
                                        aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a title="Telegram" rel="noopener noreferrer" href="#" target="_blank"><i class="fa fa-telegram" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a title="WhatsApp" rel="noopener noreferrer" href="#" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a title="Instagram" rel="noopener noreferrer" href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End single blog -->

                    <!-- Start single blog -->
                    <div class="col-md-6 col-lg-3 col-sm-6 mb-lm-30px pl-lg-40px">
                        <div class="single-wedge">
                            <h4 class="footer-herading">{{ __('frontend.my_account') }}</h4>
                            <div class="footer-links">
                                <div class="footer-row">
                                    <ul class="align-items-center">
                                        <li class="li"><a class="single-link" href="#">
                                            {{ __('frontend.my_account') }}
                                        </a></li>
                                        <li class="li"><a class="single-link" href="#">
                                            {{ __('frontend.my_order') }}
                                        </a></li>
                                        <li class="li"><a class="single-link" href="#">
                                            {{ __('frontend.pur_history') }}
                                        </a></li>
                                        <li class="li"><a class="single-link" href="#">
                                            {{ __('frontend.privacy') }}
                                        </a></li>
                                        <li class="li"><a class="single-link" href="#">
                                            {{ __('frontend.help_center') }}
                                        </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->

                    <!-- Start single blog -->
                    <div class="col-md-6 col-lg-3 col-sm-12">
                        <div class="single-wedge">
                            <h4 class="footer-herading">{{ __('frontend.contact_info') }}</h4>
                            <div class="footer-links">
                                <!-- News letter area -->
                                <p class="address">
                                    {{-- Address: 23, New Drum Street, London , <br> United Kingdom, E17AY --}}
                                    {{ __('frontend.address') }}
                                </p>
                                <p class="mail">{{ __('frontend.email') }}:<a href="mailto:info@gadgetszone.net"> info@gadgetszone.net</a></p>

                                <!-- News letter area  End -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-sm-12 d-flex">
                        <!-- Start single blog -->
                        <div class="single-wedge" style="width: 45%;margin-right:10px">
                            <a href="https://drive.google.com/file/d/18LCADjZFH0GvkesSnyNwgR1ZtMfUaB61/view?usp=sharing"><img src="{{ asset('assets/images/qrcode.png') }}" class="img img-thumbnail img-responsive"  alt="Site Logo" /><p class=" text-center">Android</p></a>
                        </div>
                        <div class="single-wedge" style="width: 45%">
                            <a href="#">
                                <img src="{{ asset('assets/images/ios-qrcode.jpg') }}" class="img img-thumbnail img-responsive"  alt="Site Logo" />
                                <p class=" text-center">IOS</p>
                            </a>
                        </div>
                        <!-- End single blog -->
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="line-shape-top line-height-1">
                    <div class="row flex-md-row-reverse align-items-center">
                        <div class="col-md-6 text-center text-md-end">
                            <div class="payment-mth"><a href="javascript:void(0)"><img class="img img-fluid" src="{{ asset('assets/images/icons/payment.png') }}" alt="payment-image"></a></div>
                        </div>
                        <div class="col-md-6 text-center text-md-start">
                            <p class="copy-text">
                                &copy; <?= date('Y') ?>
                                {{-- <i class="fa fa-heart" aria-hidden="true"></i>  --}}
                                 <a class="company-name" href="#">
                                <strong> Gadgets Zone </strong></a>.
                                {{ __('frontend.reversed')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
