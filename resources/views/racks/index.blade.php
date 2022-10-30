@extends('layouts.layout')
@section('content')
    <!-- Page Content  -->
    <div id="content">
        @include('partials.nav')
        <div class="container">
            <div>
                <h3 class="float-left">All Rack</h3>
                <a href="{{ route('add.rack') }}" class="btn btn-primary float-right mb-3 text-white"><i class="fa fa-plus"
                        aria-hidden="true"></i> Add</a>
            </div>
            <table class="table table-bordered text-center">
                <thead>
                    <tr class="table-primary">
                        <th>Sl No.</th>
                        <th>Rack Name</th>
                        <th>Maximum Capacity</th>
                        <th>Available Status</th>
                        <th>Created</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookRacks as $key => $bookRack)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $bookRack->rack_name }}</td>
                            <td>{{ $bookRack->max_capacity }}</td>
                            <td>{{ $bookRack->available_status > 0 ? 'Available' : 'Unavailable' }}</td>
                            <td>{{ date('d-m-Y', strtotime($bookRack->created)) }}</td>
                            <td>
                                <a title="Edit" href="{{ route('edit.rack', [$bookRack->id]) }}"> <i class='fas fa-edit'
                                        style='color:rgb(97, 96, 96)'></i> </a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('delete.book.rack', [$bookRack->id]) }}">
                                    @method('delete')
                                    @csrf
                                    <input type="hidden" name="cityId" value="{{ $bookRack->id }}">
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn"
                                        title="Delete"><i class='fas fa-trash' style='color:rgb(246, 0, 0)'></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>{{ $bookRacks->links('pagination::bootstrap-5') }}</div>
        </div>
    </div>
@endsection
