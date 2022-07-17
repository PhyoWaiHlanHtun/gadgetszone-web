@extends('frontend.layouts.master')

@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area" style="background-image: url({{ asset('assets/images/about/about.png') }});">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                {{-- <h2 class="breadcrumb-title">About Us</h2> --}}
                <!-- breadcrumb-list start -->
                {{-- <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">About Us</li>
                </ul> --}}
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- About section Start -->
<div class="about-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="about-wrapper text-justify">
                    <div class="about-contant">
                        {{-- <h2 class="title text-center">
                            <span> About Us </span>
                        </h2> --}}
                        
                        {{-- <img src="{{ asset('assets/images/about/economy-system.PNG') }}" class="mb-5" alt="Economy System" width="100%"> --}}
                        
                        {{-- @if (count($abouts) != 0)


                        @if (count($abouts) != 0)
                            @foreach ($abouts as $item)
                            <div class="mb-3">
                                <h3 class="mb-4">{{ $item->title }}</h3>
                                <div>
                                    {!! $item->para !!}
                                </div>
                            </div>

                            @endforeach
                        @else --}}
                        <h3 class="mb-4"> About Company Information </h3>
                        <div>
                            <p> Wal-mart Inc ( wal-mart store Inc U.S.A ) </p>
                            <p> Equator Technology Ltd (Reg 13826465) </p>
                            <p> 23, New Drum street, London ,united kingdom,E17AY </p>
                            <p> Email : walmartnequatortech@gmail.com </p>

                        </div>

                        <h3 class="my-4"> About Us </h3>
                        <div>
                            <p> Equator technology is a member of Wal mart INC ( U.S.A )。</P>
                            <p> Equator technology (gadgetszone.net) is register in London ( United Kingdom ). </p>
                            <p> gadgetszone.net is our company online platform run by Equator technology. </p>

                            <p> Our company is a global e-commerce intelligent cloud distribution order promotion platform, which is a bridge between users and e-commerce merchants.Equator technology International is a company that helps merchants around the world to increase the visibility of their products, during the period of Covid-19 with its online order matching system has offered more than 5 million jobs. We focus on the fields of endpoint services, enterprise cloud computing provide competitive products, services 。 We create an end-to-end solution advantage solutions for our customers and users, for which we are making efforts to build a largely connected society around the world。Today we have fulfilled initial expansion plans
                            in Singapore, Ecuador, Colombia, Peru, Chile , Venezuela, El Salvador,Kyrgyzstan, Pakistan, Malaysia, Dominican Republic, Thailand,Taiwan,Indonesia, Brazil, Vietnam and the Philippines. </p>

                            <p> We believe that in the future our services and solutions willl be used in more than 170 countries benefiting a third of the world's population.Equator technology has enabled millions ofmerchants and users to enjoy the advantages of the 5G era with its advanced automatic order matching system,all users need to do is upload their products to the platform and then pay promotional fees to make them visible on Equator Technology Internationals home pages, in this way it is simple and straightforward to use the intelligent online order matching system to substantially increase the visibility of goods and make them more popular around the world. After merchants on the platform pay promotional fees through the smart distribution system. 90% or 95% of the company's revenue will be rewarded to users who help the platform increase product Sales in the form of user purchases. Users will typically receive between 5% and 8% on their account which greatly enhances the motivation of users to join Equator technology. Equator technology philosophy: good management. continuous innovation. openness and cooperation.
                            Equator Technology International's mission: to create the future together with our users.</p> <br>

                            <p> Headquarters location: 23, New Drum Street, London, United Kingdom, EI 7AY </p>
                            <p> CEO: George Ethan FRANK </p>
                            <p> EQUATOR TECHNOLOGY LTD  </p>
                            <p> Registered in United Kingdom, Number: 13826465 </p> <br>
                        </div>

                        <h3 class="my-4"> Coporate With Us </h3>
                        <div>
                            <p>
                                This is the era of sharing economy, everyone become the strongest cooperative agent.The platform is a Five-level agent model. For example - </p> <br>

                            <p> When your friend A uses your invitation code to
                            register, he will become your Level 1 member,
                            and you can get 16% of his daily profit as an
                            agent commission </p> <br>

                            <p> When your friend A invites a new member B
                            then B will become your Level 2 member, and
                            you can get 8% of his daily profit as an agent
                            commission </p> <br>

                            <p> When a new member B invites a new member
                            C, then C will become your Level 3 member
                            and you can get 4% of his daily profit as an
                            agent commission. </p> <br>

                            <p> When a new member C invites a new member
                            D, then D will become your Level 4 member
                            and you can get 1% of his daily profit as an
                            agent commission. </p> <br>

                            <p> When a new member D invites a new member
                            E, then E will become your Level 5 member
                            and you can get 1% of his daily profit as an
                            agent commission. </p> <br>

                            <p> Reminder: The agency commission will be
                            directly allocated to your account balance by
                            walmart INC, and this will not affect the
                            personal Income of your team members </p> <br>

                        </div>

                        <h3 class="my-4"> About Work Benefit And Commission </h3>
                        <div>
                            <p>
                                Users can get 0.25% promotion commission of the promotion product price, and can make 20 orders per day.For example, if the account amount is 1,000, the system will automatically match the promoted products within 1,000, and if the account amount is 10,000, the system will automatically match the promoted products within 10,000. That is to say, the more the account amount, the more expensive products we can buy, and the commission earned from the promotion will also be higher. the higher. </p> <br>

                            <p>Completing 20 promotion tasks every day can earn 5% to 8% of the promotion principal. </p> <br>

                            <p>For example, the minimum commission rebate is 5%. The account amount of 1000 can earn 50 to 80 promotion commission per day, and the account amount of 10000 can earn 500 to 800 promotion commission per day.</p> <br>

                            <p> Each account has 20 opportunities to place orders every day to earn commissions. Don't miss the chance. </p> <br>

                        </div>

                        <h3 class="my-4">About Withdrawl </h3>
                        <div>
                            <p>
                                The Commissions will use USDT to your account . </p> <br>
                            <p> Commissions and rewards will be issued to the referrers account within 24 hours after the customer service staff approves it. The referrer can view the referrers commission and rewards in the Account Details.</p> <br>
                            <p> The terms and conditions contained here in may be changed or modified at any time. Your continued paricipation in the program means that you accept any changes or modifications to
                                In the event of fraudulent rewards or other iolations of relevant regulations, including but not limied to the above examples, Equator technology reserves the right to.
                            </p> <br>

                        </div>

                        <h3 class="my-4">About Top-up </h3>
                        <div>
                            <p> Why we need to top up money ? </p> <br>
                            <p> The e-commerce platform needs to receive the equivalent amount of the product, and the e-commerce platform will record and confirm the order to increase sales. </p> <br>
                            <p> Because it is helping the merchants of the major Internet shopping platforms to make real orders, the principal is definitely required. </p> <br>
                            <p> However, the merchant will not ship the goods to us, but will return the principal we paid and the commission we need to pay back to our account when we submit the order. </p> <br>
                            <p> Just go through a process, the competitiveness among the merchants on the shopping platform is very strong. The ranking of the same product determines the sales volume of a store, and the ranking is evaluated based on sales volume, praise, and exposure.
                            </p> <br>
                        </div>
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About section End -->

@endsection
