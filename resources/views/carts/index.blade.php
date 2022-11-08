@extends('users.layout')
@section('content')
    <div id="content">

        @include('users.partials.nav')

        <div class="container">
            <form action="{{route('checkout.books')}}" method="POST">
                @csrf

                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:30%">Image</th>
                            <th style="width:20%">Book Name</th>
                            <th style="width:40%">Description</th>
                            <th style="width:10%">Author Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookLists as $bookList)
                            <tr>
                                <td>{{ $bookList->image }}</td>
                                <td>{{ $bookList->title }}</td>
                                <td>{{ $bookList->description }}</td>
                                <td>{{ $bookList->author }}</td>
                            </tr>
                            <input type="hidden" name="text" value="{{ $bookLists }}" />
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <td><a href="{{ '/' }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Back
                                    to Library</a>
                            </td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center"><strong>Total: {{ $bookLists->count() }}</strong></td>
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
