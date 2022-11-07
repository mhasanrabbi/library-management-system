@extends('layouts.layout')

@push('head')
<script>
</script>
@endpush

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    <strong>Successful:</strong>
    {{ Session::get('success') }}
</div>
@endif

@section('content')

<div id="content">
    @include('books.partials.nav')
    <h1>Cart</h1>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            @if (!empty($cart))
            @foreach ($cart as $item)
            <?php $total += $item['price'] * $item['qty']; ?>
            <tr>
                <td>{{ $item['title'] }}</td>
                {{-- <td>{{ $item['category'] }}</td> --}}
                <td>${{ $item['price'] }}</td>
                <td>{{ $item['qty'] }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>

    <p>
        <strong>Total: ${{ $total}}</strong>
    </p>

    <p>
        <a class="btn btn-primary btn-lg" href="/pay-with-paypal">

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet"
                viewBox="0 0 16 16">
                <path
                    d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
            </svg>
            Pay with PayPal</a>
    </p>
</div>

@endsection
@section('footer-scripts')
<script>
    $(document).ready(function() {

            window.cart = <?php echo json_encode($cart); ?>;


            updateCartButton();

            $('.add-to-cart').on('click', function(event) {

                var cart = window.cart || [];
                cart.push({
                    'id': $(this).data('id'),
                    'title': $(this).data('title'),
                    'price': $(this).data('price'),
                    'qty': $(this).prev('input').val()
                });
                window.cart = cart;

                $.ajax('/store/add-to-cart', {
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "cart": cart
                    },
                    success: function(data, status, xhr) {

                    }
                });

                updateCartButton();
            });
        })

        function updateCartButton() {

            var count = 0;
            window.cart.forEach(function(item, i) {

                count += Number(item.qty);
            });

            $('#items-in-cart').html(count);
        }
</script>
@endsection