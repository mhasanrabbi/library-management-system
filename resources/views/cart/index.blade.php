@extends('cartlayout')

@push('head')
    <script> 
    </script>
@endpush
@section('content')
    <br>
    <div class="float-right">
        <a class="btn btn-success" href="{{ action([CartController::class,'index'])}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart"
                viewBox="0 0 16 16">
                <path
                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
            <span id="items-in-cart">0</span> items in cart
        </a>
    </div>

    <h1>Store</h1>

    @if ($products->count() == 0)
        <tr>
            <td colspan="5">No products to display.</td>
        </tr>
    @endif

    <?php $count = 0; ?>

    @foreach ($products as $product)
        @if ($count % 3 == 0)
            <div class="row">
        @endif

        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail"
                    alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">{{ $product->category->name }} / {{ $product->name }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">Only ${{ $product->price }}</small>
                        <div class="btn-group">
                            <input type="number" value="1" min="1" max="100">
                            <button class="add-to-cart" type="button" class="btn btn-sm btn-outline-secondary"
                                data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                data-price="{{ $product->price }}">Add to Cart</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @if ($count % 3 == 2)
            </div>
        @endif

        <?php $count++; ?>
    @endforeach
@endsection

@section('footer-scripts')
    <script>
        $(document).ready(function() {

            window.cart = <?php echo json_encode($cart); ?>;

            updateCartButton();

            $('.add-to-cart').on('click', function(event) {

                var cart = window.cart || [];
                cart.push({
                    'id': $(this) data('id'),
                    'name': $(this).data('name'),
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
