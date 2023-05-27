@extends('ContactUs.layout')
@section('content')
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.3s">
        <div class="container">
            <div class="booking p-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-6 text-white">
                        <h6 class="text-white text-uppercase">Contact Us</h6>
                        <h1 class="text-white mb-4">Contact us</h1>
                        <p class="mb-4">Feel free to reach out to us if you have any questions, need assistance, or have any specific requests. We are here to help and provide the best possible support. Whether you're facing any issues with our services or simply want to share your thoughts, we value your feedback.</p>
                        <p class="mb-4">Your satisfaction is our top priority, and we are glad to respond to your inquiries promptly. Contact us using the provided form or reach out to us directly via email or phone. We look forward to hearing from you and assisting you in any way we can</p>
                        
                    </div>
                    <div class="col-md-6">
                        <h1 class="text-white mb-4">Send A Message to Us</h1>
                        <form action="{{ route('contact.store') }}" method="post">
                             @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent" id="name" name="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-transparent" id="email" name="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent" id="telephone" name='telephone' placeholder="Your phone" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="telephone">Phone</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent" id="pays" name='pays' placeholder="Your country" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="pays">Country</label>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-transparent" placeholder="Special Request" id="message" name="message" style="height: 100px"></textarea>
                                        <label for="message">Special Request</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-success w-100 py-3" type="submit" value="Save">Send Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <!-- Booking Start -->