@extends('frontend.layouts.master')

@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area" style="background-image: url({{ asset('assets/images/about/invest.png') }});">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">Gadgets Zone {{ __('frontend.investment') }}</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="/">{{ __('frontend.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('frontend.investment') }}</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- Contact Area Start -->
<div class="contact-area">
    <div class="container">
        <div class="pt-100px">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form">
                        {{-- <div class="contact-title mb-30">
                            <h2 class="title"> Introduce Team  </h2>
                        </div> --}}
                    </div>
                </div>
                <div class="col-12">
                    <div class="contact-form" id="digiInvest" >
                        <div class="about-warper text-justify">
                            <div class="about-content">
                                <div>
                                    <h5 class="mb-4">Introduce Team</h5>
                                    <p class="text-justify  mb-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Our product team has a wealth of domestic overseas experience and has a deep understanding of international financial products. The team has an average industry experience of 9 years, most have an MBA or CFA We use Internet technology and financial analysis experts to select the investment products with the lowest risk and the highest return among the investment products in the world. We will provide investors with the best products on the market. To help customers who want to invest, there is a fixed income every month.</p>
                                    <p class="mb-4">Our Platform only introduces Fixed income,no risk and highest profit products around the world.</p>
                                    <h6 class="mb-4">Fixed income products can provide you with regular and steady cash flow</h6>
                                    <p class="text-justify mb-4">Fixed income products are relatively stable products, and do not need to face the volatility risks similar to investing in the secondary market. When you purchase the product, the term and expected rate of return are basically determined, you can obtain regular and stable cash flow, and better flow and funding arrangements.</p>
                                    <h6 class=" mb-4">Professional selection of high-quality fixed income products for you</h6>
                                    <p class="text-justify mb-4">We have established a complete product evaluation and risk control process. We will conduct interviews, preliminary evaluations and discussions on the products that have been initially screened, and conduct comprehensive due diligence on the proposed products. Finally, the products that have passed the decision of the risk control committee will be able to introduce platform sales, and establish a mechanism for tracking and regular reporting of after-sales products. We are committed to selecting high-quality products with competitive yields for our customers under the premise of controllable risks.</p>
                                    <h6 class=" mb-4">investment research</h6>
                                    <p class="text-justify mb-4">In order to provide targeted investment research services to clients of the Gadgets Zone Wealth Management Department, the Gadgets Zone Research Department has established a wealth management research team to continuously explore new secondary market investments by improving the “Daily View” A-share investment portfolio. Opportunities, timely provision of research reports and information, etc., to more effectively serve the clients of Digiexpress Wealth Management Department. Since its establishment in January 2008, the "Daily Viewpoint" portfolio has combined long-term investment trends and short-term investment opportunities to provide customers with continuous research support and has been widely recognized by customers.</p>
                                    <p class="text-justify mb-4">Based on the investment needs and risk preferences of wealth management clients, the research team of CICC Wealth Management, combined with the research information of buyers and sellers in the market, and relying on the standardized research platform of Digi Research Department, strives to provide high-quality wealth management services for distinguished customers of Digiexpress Wealth Management Department. Quality investment and research services. The Digiexpress Wealth Investment research team covers macro, strategy, industry, fixed income and other sectors, and helps clients invest and trade in the secondary market by building a huge stock library, discovering new stocks in a timely manner, and recommending individual stocks at the right time.</p>
                                    <p class="text-justify mb-4">The Gadgets Zone Wealth Investment research team provides long-term and in-depth research support for customers through research report release, listed company research and special research, and provides support through activities such as Digiexpress Wealth Forum, Digiexpress Customer Day, customer video exchanges and conference calls. A full range of research services.</p>
                                    <h6 class=" mb-4">product research</h6>
                                    <p class="text-justify mb-4">In order to better support the development of wealth management business and provide comprehensive and in-depth research support for professional investment services for mid-to-high-end individuals and enterprises, Digiexpress established the Wealth Research Department in early , mainly through a full range of investment product research, Control the quality of products on the wealth management business platform, participate in the product business process throughout the process, and design products independently according to the needs of Digiexpress Wealth Management customers.</p>
                                    <p class="text-justify mb-4">In terms of product research, the Wealth Research Department of Gadgets Zone has formed a research system for various product lines such as sunshine private equity, special fund accounts, closed-end funds, private equity funds, private placement funds, and fixed-income products. Comprehensive support is provided for the quality control of products offered and presented on the platform.</p>
                                </div>
                            </div>
                            <div class="about-content mt-5">
                                <div class="container-fluid">
                                    <div class="content-title">
                                        <h6 class="text-center text-muted mb-5">Gadgets Zone Investment Management Plan</h6>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-4 mb-4"><h6 class="text-gold">Investment Product name</h6></div>
                                        <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">Digiexpress Return Collective Asset Management Plan</p></div>
                                        <div class="col-4 mb-4"><h6 class="text-gold">Promotion agency</h6></div>
                                        <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">Digiexpress Corporation Limited, Equator technology</p></div>
                                        <div class="col-4 mb-4"><h6 class="text-gold">Custodian</h6></div>
                                        <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">CITIBank Co.,Ltd.</p></div>
                                        <div class="col-4 mb-4"><h6 class="text-gold">Administrator</h6></div>
                                        <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">Digiexpress Corporation Limited</p></div>
                                        <div class="col-4 mb-4"><h6 class="text-gold">Profit</h6></div>
                                        <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">4.5% 90days,180 days 6.2%</p></div>
                                        <div class="col-4 mb-4"><h6 class="text-gold">Risk Level</h6></div>
                                        <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">2/5</p></div>
                                        <div class="col-4 mb-4"><h6 class="text-gold">Investment objective</h6></div>
                                        <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">Aiming to maintain and increase the value of collective plan assets, strive to obtain stable income during the management period</p></div>
                                        <div class="col-4 mb-4"><h6 class="text-gold">Time of participation and withdrawal</h6></div>
                                        <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">The minimum amount for a single customer to participate in this collective plan for the first time is start from USDT 500</p></div>
                                        <div class="col-4 mb-4"><h6 class="text-gold">Participation amount</h6></div>
                                        <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">3 months from the date of the collective plan</p></div>
                                        <div class="col-4 mb-4"><h6 class="text-gold">Duration</h6></div>
                                        <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">There is no fixed duration of this collective plan</p></div>
                                        <div class="col-4 mb-4"><h6 class="text-gold">Target size</h6></div>
                                        <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">The minimum total share of this collective plan is 10 million copies,</p></div>
                                        <div class="col-4 mb-4"><h6 class="text-gold">Exit rate</h6></div>
                                        <div class="col-8 mb-4">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-6"><h6 class="text-gold">holding period</h6></div><div class="col-3"><h6 class="text-gold">exit rate</h6></div>
                                                    <div class="col-6"><p class="text-muted d-inline-flex">Less holding period 90days</p></div><div class="col-3"><p class=" text-muted d-inline-flex">3%</p></div>
                                                    <div class="col-6"><p class="text-muted d-inline-flex">Less holding period 60days</p></div><div class="col-3"><p class=" text-muted d-inline-flex">2%</p></div>
                                                    <div class="col-6"><p class="text-muted d-inline-flex">Less holding period 30days</p></div><div class="col-3"><p class=" text-muted d-inline-flex">1%</p></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 mb-4"><h6 class="text-gold">Annual rate</h6></div>
                                        <div class="col-8 mb-4">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-6"><h6 class="text-gold">management fee</h6></div><div class="col-3"><h6 class="text-gold">Custody fee</h6></div>
                                                    <div class="col-6"><p class="text-muted d-inline-flex">0%</p></div><div class="col-3"><p class=" text-muted d-inline-flex">0%</p></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="description-review-wrapper">
                                        <div class="description-review-topbar nav">
                                            <button class="active" data-bs-toggle="tab" data-bs-target="#des-details2">Plan 1</button>
                                            <button data-bs-toggle="tab" data-bs-target="#des-details1">Plan 2</button>
                                            <button data-bs-toggle="tab" data-bs-target="#des-details3">Plan 3</button>
                                        </div>
                                        <div class="tab-content description-review-bottom">
                                            <div id="des-details2" class="tab-pane active">
                                                <div class="row">
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Investment Product name</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">Gadgets Zone Return Collective Asset Management Plan</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Promotion agency</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">Gadgets Zone Corporation Limited, Equator technology</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Custodian</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">CITIBank Co.,Ltd.</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Administrator</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">Gadgets Zone Corporation Limited</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Profit</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">4.5% 90days,180 days 6.2%</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Risk Level</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">2/5</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Investment objective</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">Aiming to maintain and increase the value of collective plan assets, strive to obtain stable income during the management period</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Time of participation and withdrawal</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">The minimum amount for a single customer to participate in this collective plan for the first time is start from USDT 500</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Participation amount</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">3 months from the date of the collective plan</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Duration</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">There is no fixed duration of this collective plan</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Target size</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">The minimum total share of this collective plan is 10 million copies,</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Exit rate</h6></div>
                                                    <div class="col-8 mb-4">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-6"><h6 class="text-gold">holding period</h6></div><div class="col-3"><h6 class="text-gold">exit rate</h6></div>
                                                                <div class="col-6"><p class="text-muted d-inline-flex">Less holding period 90days</p></div><div class="col-3"><p class=" text-muted d-inline-flex">3%</p></div>
                                                                <div class="col-6"><p class="text-muted d-inline-flex">Less holding period 60days</p></div><div class="col-3"><p class=" text-muted d-inline-flex">2%</p></div>
                                                                <div class="col-6"><p class="text-muted d-inline-flex">Less holding period 30days</p></div><div class="col-3"><p class=" text-muted d-inline-flex">1%</p></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Annual rate</h6></div>
                                                    <div class="col-8 mb-4">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-6"><h6 class="text-gold">management fee</h6></div><div class="col-3"><h6 class="text-gold">Custody fee</h6></div>
                                                                <div class="col-6"><p class="text-muted d-inline-flex">0%</p></div><div class="col-3"><p class=" text-muted d-inline-flex">0%</p></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-center mb-4">
                                                        <a href="{{ route('frontend.diginvest.show',1) }}" class="btn btn-sm" id="investBtn" style="line-height: 50px">{{ __('frontend.invest_now') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="des-details1" class="tab-pane">
                                                <div class="row">
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Investment Product name</h6></div><div class="col-8 mb-4"><p class=" text-muted d-inline-flex">Gadgets Zone Deposit Management Plan</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Promotion agency</h6></div><div class="col-8 mb-4"><p class=" text-muted d-inline-flex">Gadgets Zone Corporation Limited, Equator technology</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Custodian</h6></div><div class="col-8 mb-4"><p class=" text-muted d-inline-flex">CITIBank Co.,Ltd.</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Administrator</h6></div><div class="col-8 mb-4"><p class=" text-muted d-inline-flex">Gadgets Zone Corporation Limited</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Profit</h6></div><div class="col-8 mb-4"><p class=" text-muted d-inline-flex">30days 0.6% ,60days 0.9% ,90days 1.3%</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Investment objective</h6></div><div class="col-8 mb-4"><p class=" text-muted d-inline-flex">Aiming to maintain and increase the value of collective plan assets, strive to obtain stable income during the management period</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Risk Level</h6></div><div class="col-8 mb-4"><p class=" text-muted d-inline-flex">----</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Time of participation and withdrawal</h6></div><div class="col-8 mb-4"><p class=" text-muted d-inline-flex">30 days from the date of the collective plan</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Participation amount</h6></div><div class="col-8 mb-4"><p class=" text-muted d-inline-flex">The minimum amount for a single customer to participate in this collective plan for the first time is start from USDT 500</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Duration</h6></div><div class="col-8 mb-4"><p class=" text-muted d-inline-flex">There is no fixed duration of this collective plan</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Target size</h6></div><div class="col-8 mb-4"><p class=" text-muted d-inline-flex">The minimum total share of this collective plan is 1.6 million copies,</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Exit rate</h6></div>
                                                    <div class="col-8 mb-4">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-6"><h6 class="text-gold">holding period</h6></div><div class="col-3"><h6 class="text-gold">exit rate</h6></div>
                                                                <div class="col-6"><p class="text-muted d-inline-flex">Less holding period 90days</p></div><div class="col-3"><p class=" text-muted d-inline-flex">--</p></div>
                                                                <div class="col-6"><p class="text-muted d-inline-flex">Less holding period 60days</p></div><div class="col-3"><p class=" text-muted d-inline-flex">--</p></div>
                                                                <div class="col-6"><p class="text-muted d-inline-flex">Less holding period 30days</p></div><div class="col-3"><p class=" text-muted d-inline-flex">3%</p></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Annual rate</h6></div>
                                                    <div class="col-8 mb-4">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-6"><h6 class="text-gold">management fee</h6></div><div class="col-3"><h6 class="text-gold">Custody fee</h6></div>
                                                                <div class="col-6"><p class="text-muted d-inline-flex">0%</p></div><div class="col-3"><p class=" text-muted d-inline-flex">0%</p></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-center mb-4">
                                                        <a href="{{ route('frontend.diginvest.show',2) }}" class="btn btn-sm" id="investBtn" style="line-height: 50px">{{ __('frontend.invest_now') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="des-details3" class="tab-pane">
                                                <div class="row">
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Investment Product name</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">Gadgets Zone eco growth Management Plan</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Promotion agency</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">Gadgets Zone Corporation Limited, Equator technology</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Custodian</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">CITIBank Co.,Ltd.</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Administrator</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">Gadgets Zone Corporation Limited</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Profit</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">3.4% 90days, after 120days 4%</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Investment objective</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">Aiming to maintain and increase the value of collective plan assets, strive to obtain stable income during the management period</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Risk Level</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">1/5</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Participation amount</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">The minimum amount for a single customer to participate in this collective plan for the first time is start from USDT 500</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Time of participation and withdrawal</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">90 days from the date of the collective plan</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Duration</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">There is no fixed duration of this collective plan</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Target size</h6></div>
                                                    <div class="col-8 mb-4"><p class=" text-muted d-inline-flex">The minimum total share of this collective plan is 800,000 copies,</p></div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Exit rate</h6></div>
                                                    <div class="col-8 mb-4">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-6"><h6 class="text-gold">holding period</h6></div><div class="col-3"><h6 class="text-gold">exit rate</h6></div>
                                                                <div class="col-6"><p class="text-muted d-inline-flex">Less holding period 90days</p></div><div class="col-3"><p class=" text-muted d-inline-flex">3%</p></div>
                                                                <div class="col-6"><p class="text-muted d-inline-flex">Less 60days holding period</p></div><div class="col-3"><p class=" text-muted d-inline-flex">2%</p></div>
                                                                <div class="col-6"><p class="text-muted d-inline-flex">Less 30days holding</p></div><div class="col-3"><p class=" text-muted d-inline-flex">1%</p></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 mb-4"><h6 class="text-gold">Annual rate</h6></div>
                                                    <div class="col-8 mb-4">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-6"><h6 class="text-gold">management fee</h6></div><div class="col-3"><h6 class="text-gold">Custody fee</h6></div>
                                                                <div class="col-6"><p class="text-muted d-inline-flex">0%</p></div><div class="col-3"><p class=" text-muted d-inline-flex">0%</p></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-center mb-4">
                                                        <a href="{{ route('frontend.diginvest.show',2) }}" class="btn btn-sm" id="investBtn" style="line-height: 50px">{{ __('frontend.invest_now') }}</a>
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
<!-- Contact Area End -->

@endsection
