@extends('frontend.layouts.master')

@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">Account</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Account</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->
<!-- account area start -->
<div class="account-dashboard pt-100px pb-100px">
    <div class="container">
        <div class="row">

            @include('frontend.partials.alert')

            <div class="col-sm-12 col-md-3 col-lg-3">
                <!-- Nav tabs -->
                <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                    <ul role="tablist" class="nav flex-column dashboard-list">
                        <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link active">Dashboard</a></li>
                        <li> <a href="#orders" data-bs-toggle="tab" class="nav-link">Orders</a></li>
                        <li><a href="#downloads" data-bs-toggle="tab" class="nav-link">Downloads</a></li>
                        <li><a href="#address" data-bs-toggle="tab" class="nav-link">Addresses</a></li>
                        <li><a href="#account-details" data-bs-toggle="tab" class="nav-link">Account details</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <!-- Tab panes -->
                <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                    
                    <div class="tab-pane fade show active" id="dashboard">
                        <h4> Agent Dashboard </h4>
                        <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent
                                orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">Edit your password and account details.</a></p>
                    </div>

                    <div class="tab-pane fade" id="orders">
                        <h4>Orders</h4>
                        <div class="table_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>May 10, 2018</td>
                                        <td><span class="success">Completed</span></td>
                                        <td>$25.00 for 1 item </td>
                                        <td><a href="cart.html" class="view">view</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>May 10, 2018</td>
                                        <td>Processing</td>
                                        <td>$17.00 for 1 item </td>
                                        <td><a href="cart.html" class="view">view</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="downloads">
                        <h4>Downloads</h4>
                        <div class="table_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Downloads</th>
                                        <th>Expires</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Shopnovilla - Free Real Estate PSD Template</td>
                                        <td>May 10, 2018</td>
                                        <td><span class="danger">Expired</span></td>
                                        <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                    </tr>
                                    <tr>
                                        <td>Organic - ecommerce html template</td>
                                        <td>Sep 11, 2018</td>
                                        <td>Never</td>
                                        <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="address">
                        <p>The following addresses will be used on the checkout page by default.</p>
                        <h5 class="billing-address">Billing address</h5>
                        <a href="#" class="view">Edit</a>
                        <p class="mb-2"><strong>Michael M Hoskins</strong></p>
                        <address>
                            <span class="mb-1 d-inline-block"><strong>City:</strong> Seattle</span>,
                            <br>
                            <span class="mb-1 d-inline-block"><strong>State:</strong> Washington(WA)</span>,
                            <br>
                            <span class="mb-1 d-inline-block"><strong>ZIP:</strong> 98101</span>,
                            <br>
                            <span><strong>Country:</strong> USA</span>
                        </address>
                    </div>

                    <div class="tab-pane fade" id="account-details">
                        <h3>Account details </h3>
                        <div class="login">
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <form action="{{ route('frontend.user.update') }}" method="post">
                                       @csrf
                                        <div class="default-form-box mb-20">
                                            <label> Username</label>
                                            <input type="text" name="username" value="{{ $user->username }}">
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label>Email</label>
                                            <input type="text" name="email" value="{{ $user->email }}">
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label>Phone</label>
                                            <input type="text" name="phone" value="{{ $user->phone }}">
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label>Password</label>
                                            <input type="password" name="password">
                                        </div>
                                        <div class="default-form-box mb-20">
                                            <label>Confirm Password</label>
                                            <input type="password" name="confirm-password">
                                        </div>
                                        <br>                                     
                                        <div class="save_button mt-3">
                                            <button class="btn" type="submit">Save</button>
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
<!-- account area start -->

@endsection