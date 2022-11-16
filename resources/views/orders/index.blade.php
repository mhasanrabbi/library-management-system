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
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:10%">Image</th>
                        <th style="width:20%">Book Name</th>
                        <th style="width:40%">Description</th>
                        <th style="width:10%">Author Name</th>
                        <th style="width:10%">Return Date</th>
                        <th style="width:10%">Due Date</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{dump($cartLists)}} --}}
                    @unless(empty($myBooks))
                        @foreach ($myBooks as $myBook)
                            <tr>
                                <td>{{ $myBook->book->image }}</td>
                                <td>{{ $myBook->book->title }}</td>
                                <td>{{ $myBook->book->description }}</td>
                                <td>{{ $myBook->book->author }}</td>
                                <td>{{ !empty($myBook->return_date) ? Carbon\Carbon::parse($myBook->return_date)->format('d/m/Y') : 'Borrowed' }}
                                </td>
                                <td>{{ Carbon\Carbon::parse($myBook->due_date)->format('d/m/Y') }}
                                    <?php
                                    $today = today();
                                    $dueDay = \Carbon\Carbon::parse($myBook->due_date)->format('Y-m-d');
                                    $difference = $today->diffInDays($dueDay, false);
                                    if ($difference < 0) {
                                       echo '<p><span class="badge badge-danger">Due</span></p>';
                                    }
                                    ?>
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
                        <td colspan="4" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Total: {{ $myBooks->count() }}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
