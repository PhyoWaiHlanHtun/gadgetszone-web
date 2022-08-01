<!-- Modal -->
<div class="modal modal-2 fade" id="productModal" tabindex="-1" role="dialog">
</div>
<!-- Modal end -->

<!-- Register Pop-up Modal -->
<div class="modal modal-2 fade" id="regModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" id="login-close">
                <button type="button" class="btn-close" id="login11" data-bs-dismiss="modal" aria-label="Close"> <i class="pe-7s-close"></i></button>
                <div class="row">
                    <div class="login-register-area pt-70px pb-70px">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 col-md-12 ml-auto mr-auto">
                                    @if( $message = Session::get('error'))
                                        <span class="text-center text-danger d-block mb-3"> {{ $message }} </span>
                                    @endif
                                    <div class="login-register-wrapper">
                                        <div class="login-register-tab-list nav">
                                            <a class="active" data-bs-toggle="tab" href="#lg1">
                                                <h4>{{ __('frontend.sign_up') }}</h4>
                                            </a>
                                            <a data-bs-toggle="tab" href="#lg2">
                                                <h4>{{ __('frontend.user_login') }}</h4>
                                            </a>
                                        </div>
                                        <div class="tab-content">
                                            <div id="lg1" class="tab-pane active">
                                                <div class="login-form-container p-5">
                                                    <div class="login-register-form">
                                                        <form action="{{ route('user.register.post') }}" method="post">
                                                            @csrf

                                                            <div class="mb-3">
                                                                <input type="text" name="username" placeholder="{{ __('frontend.username') }}" class="@error('username') border-danger @enderror" />
                                                                @error('username')
                                                                    <span class="text-danger" role="alert">
                                                                        <strong> {{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="mb-3">
                                                                <input name="email" placeholder="{{ __('frontend.email') }}" type="email" class="@error('email') border-danger @enderror"/>
                                                                @error('email')
                                                                    <span class="text-danger" role="alert">
                                                                        <strong> {{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="mb-3">
                                                                <input name="phone" placeholder="{{ __('frontend.phone') }}" type="tel" class="@error('phone') border-danger @enderror" />
                                                                @error('phone')
                                                                    <span class="text-danger" role="alert">
                                                                        <strong> {{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="mb-3">
                                                                <input type="password" name="password" placeholder="{{ __('frontend.password') }}" class="@error('password') border-danger @enderror" />
                                                                @error('password')
                                                                    <span class="text-danger" role="alert">
                                                                        <strong> {{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="mb-3">
                                                                <input type="password" name="confirm-password" placeholder="{{ __('frontend.confirm_pass') }}" class="@error('confirm-password') border-danger @enderror" />
                                                                @error('confirm-password')
                                                                    <span class="text-danger" role="alert">
                                                                        <strong> {{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="mb-3">
                                                                <input name="referral" placeholder="{{ __('frontend.ref_code') }}" type="text" class="@error('referral') border-danger @enderror" />
                                                                @error('referral')
                                                                    <span class="text-danger" role="alert">
                                                                        <strong> {{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="button-box">
                                                                <button type="submit"><span>
                                                                    {{ __('frontend.sign_up') }}
                                                                </span></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="lg2" class="tab-pane">
                                                <div class="login-form-container p-5">
                                                    <div class="login-register-form">
                                                        <form action="{{ route('user.login.post') }}" method="post">
                                                            @csrf

                                                            <div class="mb-3">
                                                                <input type="text" name="email" placeholder="{{ __('frontend.email') }}" />
                                                                @error('email')
                                                                    <span class="text-danger" role="alert">
                                                                        <strong> {{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="mb-3">
                                                                <input type="password" name="password" placeholder="{{ __('frontend.password') }}" />
                                                                @error('password')
                                                                    <span class="text-danger" role="alert">
                                                                        <strong> {{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            @error('error')
                                                                <span class="text-danger" role="alert">
                                                                    <strong> {{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                            <div class="button-box">
                                                                <div class="login-toggle-btn">
                                                                    <input type="checkbox" name="remember" id="remember" />
                                                                    <label for="remember"> {{ __('frontend.remember') }} </label>
                                                                    {{-- <a href="#">Forgot Password ?</a> --}}
                                                                </div>
                                                                <button type="submit"><span>
                                                                    {{ __('frontend.login') }}
                                                                </span></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@if( checkAdvertiseImg() == true )
<!-- Ads Popup Modal -->
<div class="modal modal-2 fade" id="adsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" id="login-close">
                <button type="button" class="btn-close" id="login11" data-bs-dismiss="modal" aria-label="Close"> <i class="pe-7s-close"></i></button>
                <div class="row">
                    <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                        <img src="{{ asset(getImage(getAdvertiseImg())) }}" alt="Advertise Image" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Modal Alert -->
<div class="modal customize-class fade" id="inviteModalAlert" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                <div class="tt-modal-messages">
                    <i class="pe-7s-close-circle"></i> Error !
                </div>
                <div class="tt-modal-product my-3 px-5">
                    <h4 class="tt-title mt-5"><a href="#"> Please, Login to your user account first !</a></h4>
                    <a href="{{ route('user.login') }}" class="btn mt-3 mx-auto" style="width:50%" id="customBtn"> Login Here </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Copy Modal -->
<div class="modal customize-class fade" id="copySuccessModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                <div class="tt-modal-messages">
                    <i class="pe-7s-check"></i> Success !
                </div>
                <div class="tt-modal-product my-3 px-3">
                    <h2 class="tt-title"><span id="copyText" style=" display:block; overflow-wrap:anywhere;">  </span> is successfully copied !</h2>

                </div>
            </div>
        </div>
    </div>
</div>

@if( Session::get('warning') || Session::get('success'))
<div class="modal customize-class fade show" id="alertModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                <div class="tt-modal-product my-3 px-3">
                    <h2 class="tt-title">{{ Session::get('warning') }} {{ Session::get('success') }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if( $errors->any() )
<div class="modal customize-class fade show" id="alertModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                <div class="tt-modal-product my-3 px-3">
                    <ul>
                    @foreach( $errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
