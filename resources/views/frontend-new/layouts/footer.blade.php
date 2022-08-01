<footer>
    <div class="f-top v2">
        <div class="container container-240">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <div class="footer-block footer-about">
                        <div class="f-logo">
                            <a href="#"><img src="{{ asset('frontend/img/logo/ecome-logo.png') }}" alt="" class="img-reponsive"></a>
                        </div>
                        <p class="about-text">
                            Gadgets Zone  {{ __('frontend.footer_text') }}
                        </p>
                        <div class="footer-social social">
                            <h3 class="footer-block-title">Follow us</h3>
                            <a href="#" class="fa fa-facebook"></a>
                            <a href="#" class="fa fa-paper-plane"></a>
                            <a href="#" class="fa fa-whatsapp"></a>
                            <a href="#" class="fa fa-instagram"></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                    <div class="footer-block">
                        <h3 class="footer-block-title">{{ __('frontend.my_account') }}</h3>
                        <ul class="footer-block-content">
                            <li><a href="#">{{ __('frontend.my_account') }}</a></li>
                            <li><a href="#"> {{ __('frontend.my_order') }}</a></li>
                            <li><a href="#">{{ __('frontend.pur_history') }}</a></li>
                            <li><a href="#">{{ __('frontend.privacy') }}</a></li>
                            <li><a href="#">{{ __('frontend.help_center') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                    <div class="footer-block">
                        <h3 class="footer-block-title">{{ __('frontend.contact_info') }}</h3>
                        <ul class="footer-block-content">
                            <li>{{ __('frontend.address') }}</li>
                            <li>{{ __('frontend.email') }}:<a href="mailto:info@ecomezone.net"> info@ecomezone.net</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="single-wedge" style="width: 45%;margin-right:10px">
                        <a href="https://drive.google.com/file/d/18LCADjZFH0GvkesSnyNwgR1ZtMfUaB61/view?usp=sharing"><img src="{{ asset('assets/images/qrcode.png') }}" class="img img-thumbnail img-responsive"  alt="Site Logo" /><p class=" text-center">Android</p></a>
                    </div>
                    <div class="single-wedge" style="width: 45%">
                        <a href="#">
                            <img src="{{ asset('assets/images/ios-qrcode.jpg') }}" class="img img-thumbnail img-responsive"  alt="Site Logo" />
                            <p class=" text-center">IOS</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="f-bottom">
        <div class="container container-240">
            <div class="row flex lr">
                <div class="col-xs-6 f-copyright"><span>© <?= date('Y') ?> E-Come Zone .{{ __('frontend.reversed')}}</span></div>
                <div class="col-xs-6 f-payment hidden-xs">
                    <a href="#"><img src="{{ asset('frontend/img/payment/mastercard.png') }}" alt="" class="img-reponsive"></a>
                    <a href="#"><img src="{{ asset('frontend/img/payment/paypal.png') }}" alt="" class="img-reponsive"></a>
                    <a href="#"><img src="{{ asset('frontend/img/payment/visa.png') }}" alt="" class="img-reponsive"></a>
                    <a href="#"><img src="{{ asset('frontend/img/payment/american-express.png') }}" alt="" class="img-reponsive"></a>
                    <a href="#"><img src="{{ asset('frontend/img/payment/western-union.png') }}" alt="" class="img-reponsive"></a>
                    <a href="#"><img src="{{ asset('frontend/img/payment/jcb.png') }}" alt="" class="img-reponsive"></a>
                </div>
            </div>
        </div>
    </div>
</footer>
