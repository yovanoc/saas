@extends('account.layouts.default')

@section('account.content')
    <div class="card card-default">
        <div class="card-body">
            <form action="{{ route('account.subscription.card.store') }}"method="post" id="card-form">
                @csrf

                <p>Your new card will be used for future payments.</p>

                <div class="form-group row mb-0">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary" id="update">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script>
        let handler = StripeCheckout.configure({
            key: '{{ config('services.stripe.key') }}',
            locale: 'auto',
            token: function (token) {
                let form = $('#card-form');

                $('#update').prop('disabled', true);

                $('<input>').attr({
                    type: 'hidden',
                    name: 'token',
                    value: token.id
                }).appendTo(form);

                form.submit();
            }
        });

        $('#update').click(function (e) {
            handler.open({
                name: 'SaaS Ltd.',
                currency: 'eur',
                key: '{{ config('services.stripe.key') }}',
                email: '{{ auth()->user()->email }}',
                panelLabel: 'Update card'
            });

            e.preventDefault();
        })
    </script>
@endsection