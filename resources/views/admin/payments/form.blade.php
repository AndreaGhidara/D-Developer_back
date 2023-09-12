@extends('layouts.admin')



@section('content')
    <div class="container paymentBox rounded-5 py-5 my-5 gradient-background-blue">
        <!--Titolo-->
        <div class="row">
            <div class="col text-light text-center">
                <h1>Procedi con il pagamento</h1>
                <div class="spacer"></div>
            </div>
        </div>
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
            <div class="row">
                <!--Lato sinistro del container-->
                <div class="col-lg-6 text-center text-light p-3">
                    <h5>Ci siamo quasi !</h5>
                    <p>Inserisci i tuoi dati e procedi al pagamento... <br>
                        la sponsorizzazione sarà attiva fin da subito, <br>
                        allo scadere del tempo il tuo profilo non
                        sarà più messo in evidenza ! <br>
                        <i class="fa-solid fa-hand-holding-dollar text-light"></i>
                    </p>
                    <img class="img-fluid" src="/duckSpecchiata.png" alt="" width="550" height="550">
                </div>
                <!--Lato destro del container-->
                <div class="col-lg-6 p-3">
                    <div class="row">
                        <div class="col">
                            <label for="name_on_card">Nome sulla carta</label>
                            <input value="{{$user->getAttributes()['name']}}" type="text" class="paymentFormInput form-control" id="name_on_card" name="name_on_card">
                        </div>
                    </div>
                     <div class="row">
                        <div class="col">
                            <label for="email">Email</label>
                            <input value="{{$user->getAttributes()['email']}}" name="email" type="email" class="paymentFormInput form-control" id="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group ">
                                <label for="amount">Totale</label>
                                <input type="text" class="form-control paymentFormInput" id="amount" name="amount" value="{{$sponsor['price']}}" aria-label="readonly" readonly>
                            </div>
                        </div>
                    </div>
                    <!--Pagamento-->
                    <div class="row row-cols-1">
                        <div class="col">
                            <label for="card-number">Numero carta</label>
                            <div class="form-control text-end paymentFormInput" id="card-number"></div>
                        </div>
                        <div class="col form-group">
                            <label for="expiration-date">Scadenza</label>
                            <div class="form-control text-end paymentFormInput" id="expiration-date"></div>
                        </div>
                        <div class="col">
                            <label for="cvv">CVC</label>
                            <div class="form-control text-end paymentFormInput" id="cvv"></div>
                        </div>
                        <div class="col mt-5 pe-5 text-end form-group">
                            <button type="submit" class="btn btn-primary">Paga ora</button>
                        </div>
                    </div>
                </div>
            </div>

            <input name="sponsorTime" value="{{$sponsor['time_sponsor']}}" type="hidden" />
            <input name="sponsorPrice" value="{{$sponsor['price']}}" type="hidden" />
            <input name="sponsorID" value="{{$sponsor['id']}}" type="hidden" />
            <input name="idUserPay" value="{{$user->getAttributes()['id']}}" type="hidden" />
            <input id="nonce" name="payment_method_nonce" type="hidden" />
        </form>
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
                        'color': 'black'
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
