@extends('layouts.layout')
@section('content')
<div id="content">
    @include('categories.partials.message')
    @include('categories.partials.nav')

    <div class="container">
        <div class="row">
            <div class="col mb-2">
                <h4 style="background-color: #f5f6fa" class="text-right p-2">
                    <a href="{{ route('manage.categories.index') }}" type="button" class="btn btn-outline-primary"><i class="fas fa-cog"></i>
                        Categories Manage</a>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#CategoryModal">
                        <i class="fas fa-plus-square"></i> New category
                    </button>
                </h4>
            </div>
        </div>
        <div class="row">
            @unless(count($categories) == 0)
            @foreach ($categories as $category)
            <div class="col-4 mb-3">
                <div class="card">
                    <div class="card-body" style="background-color: #c7ecee">
                        <h4 class="text-center" style="color: #535c68">{{ $category->Category_name }}</h4>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center" style="color: #eb4d4b">Categories not found</h4>
                    </div>
                </div>
            </div>
            @endunless
        </div>

        @include('categories.partials.pagination')
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $("document").ready(function() {
        setTimeout(() => {
            $("#flash").remove();
        }, 2000);
    });
</script>
@endsection



<!--Categories Modal -->
<div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="CategoryModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CategoryModal" style="color: #487eb0"><i class="fas fa-plus-square"></i>
                    New Categories</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

          

            <form action="{{ route('manage.categories.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Categories Name</label>
                        <input type="text" name="Category_name" class="form-control" id="name" placeholder="Enter category name">
                        @error('Category_name')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-plus-square"></i>
                        Category</button>
                </div>
            </form>
        </div>
    </div>
</div>