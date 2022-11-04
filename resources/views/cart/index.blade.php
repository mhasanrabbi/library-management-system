@extends('cartlayout')

@section('content')

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

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
        <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"/>
    </svg>
    Pay with PayPal</a>
</p>

@endsection