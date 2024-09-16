@extends('layout.app')
@section('content')

<div class="page-width container">
<form method='POST' id="customer-data-form">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name"  class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Email</label>
        <input type="email" name="email" class='form-control'>
    </div>
    <div class="form-group">
        <label for="name">Address</label>
        <input type="text" name="address"  class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Phone No</label>
        <input type="number" name="phone" class='form-control'>
    </div>
    <div class="form-group">
        <label for="name">Zip Code</label>
        <input type="number" name="zipcode" class='form-control'>
    </div>
        <button type="submit" id="checkout-button" class="btn text-light text-bold hoverBtn signin_btn">Proceed to Payment</button>
</form>


<script src="https://js.stripe.com/v3/"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var stripe = Stripe('{{ config('services.stripe.key') }}');
        var checkoutButton = document.getElementById('checkout-button');
        var form = document.getElementById('customer-data-form');

        if (checkoutButton) {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); 
               
                var formData = new FormData(form);

               
                fetch('{{ route('customer.data') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                })
                .then(function (response) {
                    return response.json(); 
                })
                .then(function (data) {
                    if (data.success) {
                       
                        return fetch('{{ route('payment.createCheckoutSession') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        });
                    } else {
                        throw new Error('Failed to store customer data');
                    }
                })
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    if (data.id) {
                        return stripe.redirectToCheckout({ sessionId: data.id });
                    } else {
                        throw new Error('Session ID not found in response');
                    }
                })
                .then(function (result) {
                    if (result.error) {
                        alert(result.error.message);
                    }
                })
                .catch(function (error) {
                    console.error('Error:', error);
                });
            });
        } else {
            console.error('Checkout button not found');
        }
    });
</script>

    </div>
</div>
@endsection