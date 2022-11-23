@extends('layouts.layout')
@section('content')
    <!-- Page Content  -->
    <div id="content">
        @include('racks.partials.nav')
        <div class="container">

            <form action="{{ route('admin.save.rack') }}" method="GET">
                @csrf
                <div class="form-group">
                    <label for="rack_name">Rack Name</label>
                    <input type="text" class="form-control" id="rack_name" name="rack_name" placeholder="Rack Name">
                </div>
                <div class="form-group">
                    <label for="max_capacity">Maximum Capacity</label>
                    <input type="text" class="form-control" size="4" id="max_capacity" name="max_capacity" maxlength="3"
                        placeholder="Maximum Capacity" onchange="changeHandler(this)" />

                </div>
                <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"
                    aria-hidden="true"></i> Save</button>
            </form>
        </div>
    </div>
    <script>
        function changeHandler(val) {
            if (Number(val.value) > 100) {
                val.value = 100
            }
        }
    </script>
@endsection
