@extends('layouts.admin')



@section('content')
    <div class="container bg-warning rounded-2 p-2 mt-5">
        <div class="col-md-6 offset-md-3">
            <h1>Payment Form</h1>
            <div class="spacer"></div>

            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.pay') }}" method="POST" id="payment-form">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input value="{{$user->getAttributes()['email']}}" name="email" type="email" class="form-control" id="email">
                </div>

                <div class="form-group">
                    <label for="name_on_card">Name on Card</label>
                    <input value="{{$user->getAttributes()['name']}}" type="text" class="form-control" id="name_on_card" name="name_on_card">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input value="{{$user->getAttributes()['address']}}" type="text" class="form-control" id="address" name="address">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="province">Province</label>
                            <input type="text" class="form-control" id="province" name="province">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="postalcode">Postal Code</label>
                            <input type="text" class="form-control" id="postalcode" name="postalcode">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input value="{{$user->getAttributes()['phone_number']}}" type="text" class="form-control" id="phone" name="phone">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control text-end" id="amount" name="amount" value="{{$sponsorshipPrice[0]}}">
                        </div>
                    </div>
                </div>

                <div class="row bg-black rounded-3 text-white m-2">
                    <div class="col-md-6">
                        <label for="cc_number">Credit Card Number</label>

                        <div class="form-group" id="card-number">

                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="expiry">Expiry</label>

                        <div class="form-group" id="expiration-date">

                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="cvv">CVV</label>

                        <div class="form-group" id="cvv">

                        </div>
                    </div>

                </div>

                <div class="spacer"></div>

                <div id="paypal-button"></div>

                <div class="spacer"></div>

                <input name="idUserPay" value="{{$user->getAttributes()['id']}}" type="hidden" />
                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button type="submit" class="btn btn-success">Submit Payment</button>
            </form>
        </div>
    </div>
    <script src="https://js.braintreegateway.com/web/3.38.1/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.38.1/js/hosted-fields.min.js"></script>

    <!-- Load PayPal's checkout.js Library. -->
    <script src="https://www.paypalobjects.com/api/checkout.js" data-version-4 log-level="warn"></script>

    <!-- Load the PayPal Checkout component. -->
    <script src="https://js.braintreegateway.com/web/3.38.1/js/paypal-checkout.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var submit = document.querySelector('input[type="submit"]');

        braintree.client.create({
            authorization: '{{ $token }}'
        }, function(clientErr, clientInstance) {
            if (clientErr) {
                console.error(clientErr);
                return;
            }

            // This example shows Hosted Fields, but you can also use this
            // client instance to create additional components here, such as
            // PayPal or Data Collector.

            braintree.hostedFields.create({
                client: clientInstance,
                styles: {
                    'input': {
                        'font-size': '14px',
                        'color': 'white'
                    },
                    'input.invalid': {
                        'color': 'red'
                    },
                    'input.valid': {
                        'color': 'green'
                    }
                },
                fields: {
                    number: {
                        selector: '#card-number',
                        placeholder: '4111 1111 1111 1111'
                    },
                    cvv: {
                        selector: '#cvv',
                        placeholder: '123'
                    },
                    expirationDate: {
                        selector: '#expiration-date',
                        placeholder: '10/2019'
                    }
                }
            }, function(hostedFieldsErr, hostedFieldsInstance) {
                if (hostedFieldsErr) {
                    console.error(hostedFieldsErr);
                    return;
                }

                // submit.removeAttribute('disabled');

                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    hostedFieldsInstance.tokenize(function(tokenizeErr, payload) {
                        if (tokenizeErr) {
                            console.error(tokenizeErr);
                            return;
                        }

                        // If this was a real integration, this is where you would
                        // send the nonce to your server.
                        // console.log('Got a nonce: ' + payload.nonce);
                        document.querySelector('#nonce').value = payload.nonce;
                        form.submit();
                    });
                }, false);
            });

            // Create a PayPal Checkout component.
            braintree.paypalCheckout.create({
                client: clientInstance
            }, function(paypalCheckoutErr, paypalCheckoutInstance) {

                // Stop if there was a problem creating PayPal Checkout.
                // This could happen if there was a network error or if it's incorrectly
                // configured.
                if (paypalCheckoutErr) {
                    console.error('Error creating PayPal Checkout:', paypalCheckoutErr);
                    return;
                }

                // Set up PayPal with the checkout.js library
                paypal.Button.render({
                    env: 'sandbox', // or 'production'
                    commit: true,

                    payment: function() {
                        return paypalCheckoutInstance.createPayment({
                            // Your PayPal options here. For available options, see
                            // http://braintree.github.io/braintree-web/current/PayPalCheckout.html#createPayment
                            flow: 'checkout', // Required
                            amount: 13.00, // Required
                            currency: 'USD', // Required
                        });
                    },

                    onAuthorize: function(data, actions) {
                        return paypalCheckoutInstance.tokenizePayment(data, function(err,
                            payload) {

                            // Submit `payload.nonce` to your server.
                            document.querySelector('#nonce').value = payload.nonce;
                            form.submit();
                        });
                    },

                    onCancel: function(data) {
                        console.log('checkout.js payment cancelled', JSON.stringify(data, 0,
                        2));
                    },

                    onError: function(err) {
                        console.error('checkout.js error', err);
                    }
                }, '#paypal-button').then(function() {
                    // The PayPal button will be rendered in an html element with the id
                    // `paypal-button`. This function will be called when the PayPal button
                    // is set up and ready to be used.

                });

            });
        });
    </script>

@endsection