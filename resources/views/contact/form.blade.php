@extends('layouts.app')

@section('content')
    <div class="container">
        <div
            class="d-flex flex-column justify-content-end align-items-start mb-5">
            <h1 class="text-center">Contact us !</h1>
            <h5>Feel free to contact us anytime, we'll answer as soon as
                possible.</h5>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header"><i class="fa fa-envelope"></i>
                        Contact us
                    </div>
                    <div class="card-body">
                        <form method="post">
                            @csrf
                            <div class="row form-group">
                                <div class="col">
                                    <label for="email">First Name</label>
                                    <input type="text" class="form-control"
                                           placeholder="Enter first name"
                                           name="firstname">
                                </div>
                                <div class="col">
                                    <label for="email">Last Name</label>
                                    <input type="text" class="form-control"
                                           placeholder="Enter last name"
                                           name="lastname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control"
                                       id="email" aria-describedby="emailHelp"
                                       placeholder="Enter email" name="mail"
                                       required>
                                <small id="emailHelp"
                                       class="form-text text-muted">We'll never
                                    share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="subject" class="form-control"
                                       id="subject"
                                       placeholder="Enter email subject"
                                       name="subject"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message"
                                          rows="6" name="message"
                                          required></textarea>
                            </div>
                            <div class="mx-auto">
                                <button type="submit"
                                        class="btn btn-dark text-right">Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="card bg-light mb-3">
                    <div
                        class="card-header text-uppercase">
                        <i class="fa fa-home"></i> Address
                    </div>
                    <div class="card-body">
                        <p>19 rue Yves Toudic</p>
                        <p>75010 PARIS</p>
                        <p>France</p>
                        <p>Email : stonkx@mail.com</p>
                        <p>Tel. +33 12 56 11 51 84</p>
                    </div>
                </div>
                <div style="width: 100%">
                    <iframe class="border rounded" width="100%" height="298"
                            src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=48.87055 ,2.3631643&amp;q=19%20rue%20Yves%20Toudic%2075010%20Paris+(StonkX)&amp;ie=UTF8&amp;t=&amp;z=17&amp;iwloc=B&amp;output=embed"
                            frameborder="0" scrolling="no" marginheight="0"
                            marginwidth="0"><a
                            href="https://www.maps.ie/draw-radius-circle-map/">Google
                            Maps radius calculator</a></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
