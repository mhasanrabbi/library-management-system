@extends('users.layout')
@section('content')
    <div id="content">

        @include('users.partials.nav')

        <div class="container">
            @if (session('message'))
                <div class="row">
                    <div class="col">
                        <div class="alert alert-warning">
                            {{ session('message') }}
                        </div>
                    </div>
                </div>
            @endif
            <form action="{{ route('checkout.books') }}" method="POST">
                @csrf
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:30%">Image</th>
                            <th style="width:20%">Book Name</th>
                            <th style="width:40%">Description</th>
                            <th style="width:10%">Author Name</th>
                            <th style="width:10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{dump($cartLists)}} --}}
                        @unless(empty($cartLists))
                            @foreach ($cartLists as $cart)
                                <tr>
                                    <td>{{ $cart->book->image }}</td>
                                    <td>{{ $cart->book->title }}</td>
                                    <td>{{ $cart->book->description }}</td>
                                    <td>{{ $cart->book->author }}</td>
                                    <td><a href="{{ route('carts.destroy', $cart->id) }}"
                                        class="btn btn-sm btn-danger">Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td class="text-center">There are no items in your card</td>
                        @endunless

                    </tbody>
                    <tfoot>
                        <tr>
                            <td><a href="{{ '/' }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Back
                                    to Library</a>
                            </td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center"><strong>Total: {{ $cartLists->count() }}</strong></td>
                            <td><button type="submit" class="btn btn-success btn-block">Checkout <i
                                        class="fa fa-angle-right"></i></button>
                            </td>
                        </tr>
                    </tfoot>
            </form>

            </table>
        </div>
    </div>
@endsection
