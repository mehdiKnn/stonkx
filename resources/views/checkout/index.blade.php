@extends('layouts.app')

@section('content')
    <div class="container">
        @guest
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Login') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-dark">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="d-flex w-100">
                <div class="w-50 p-5">
                    <h1>Your Cart</h1>
                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th style="width:50%">Product</th>
                            <th style="width:10%">Price</th>
                            <th style="width:8%">Quantity</th>
                            <th style="width:22%" class="text-center">Subtotal</th>
                            <th style="width:10%"></th>
                        </tr>
                        </thead>
                        @if(session('cart.products'))
                            <tbody>
                            @foreach(session('cart.products') as $products)
                                <tr>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <h6 class="nomargin">{{$products['product']['name']}}</h6>
                                                <p>{{$products['product']['color']}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">
                                        <h6>{{$products['product']['price']}}€</h6>
                                    </td>
                                    <td data-th="Quantity">
                                        <h6 class="text-center">{{$products['quantity']}}</h6>
                                    </td>
                                    <td data-th="Subtotal" class="text-center">
                                        <h6>{{$products['product']['price'] * $products['quantity']}}
                                            €</h6></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td>
                                </td>
                                <td colspan="2" class="hidden-xs"></td>
                                <td class="hidden-xs text-center"><strong>
                                        @php($total = 0)
                                        @foreach(session('cart.products') as $product)
                                            @php($total += $product['product']['price'] * $product['quantity'])
                                        @endforeach
                                        {{$total}}€</strong></td>
                                <td></td>
                            </tr>
                            </tfoot>
                        @endif
                    </table>
                </div>
                <div class="card w-50 p-5">
                    <form method="post" action="/checkout">
                        @csrf
                        <h3>Delivery Information<hr> </h3>
                        <div class="row form-group">
                            <div class="col">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="col">
                                <label for="confirmEmail">Confirm email</label>
                                <input type="email" class="form-control" id="confirmEmail" placeholder="Confirm email">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col">
                                <label for="firstname">First name</label>
                                <input type="text" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Enter first name">
                            </div>
                            <div class="col">
                                <label for="lastname">Last name</label>
                                <input type="text" class="form-control" id="lastname" placeholder="Enter last name">
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-5">
                                <label for="City">City</label>
                                <input type="text" id="City" class="form-control" placeholder="City">
                            </div>
                            <div class="col">
                                <label for="State">State</label>
                                <input type="text" id="State" class="form-control" placeholder="State">
                            </div>
                            <div class="col">
                                <label for="Zip">Zip</label>
                                <input type="text" id="Zip" class="form-control" placeholder="Zip">
                            </div>
                        </div>
                        <h3>Payment informations<hr></h3>
                        <div class="row form-group">
                            <div class="col">
                                <label for="firstname">First name</label>
                                <input type="text" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Enter first name">
                            </div>
                            <div class="col">
                                <label for="lastname">Last name</label>
                                <input type="text" class="form-control" id="lastname" placeholder="Enter last name">
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-7">
                                <label for="cardNumber">Card Number</label>
                                <input type="text" id="City" class="form-control" placeholder="Card Number">
                            </div>
                            <div class="col">
                                <label for="State">Date</label>
                                <input type="text" id="State" class="form-control" placeholder="State">
                            </div>
                            <div class="col">
                                <label for="cv">CV Code</label>
                                <input type="text" id="cv" class="form-control" placeholder="CV Code">
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox form-group">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Oui, j’accepte les CGV et la politique de confidentialité. </label>
                        </div>
                        <div class="custom-control custom-checkbox form-group">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Oui, je souhaite recevoir la newsletter. Se désabonner à tout moment.</label>
                        </div>
                        <button type="submit" class="btn btn-dark">Pay & Order</button>
                    </form>
                </div>
            </div>

        @endguest
    </div>
@endsection

