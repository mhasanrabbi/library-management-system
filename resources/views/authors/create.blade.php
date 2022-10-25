@extends('layouts.layout')

@section('content')
    <div id="content">

        @include('partials.nav')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <h4 class="text-right m-1" style="color: #fd79a8">
                        Do you want to add New Author?
                    </h4>
                </div>
                <div class="col-8">
                    <form action="{{ route('authors.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Author Name</label>
                            <input type="text" name="author_name" class="form-control" id="name"
                                placeholder="Enter author name">
                        </div>
                        <button type="submit" class="btn btn-outline-primary"><i class="fas fa-plus-square"></i>
                            Author</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



<!--Authors Modal -->
{{-- <div class="modal fade" id="authorModal" tabindex="-1" role="dialog" aria-labelledby="authorModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="authorModalLabel" style="color: #487eb0"><i class="fas fa-plus-square"></i> New Author</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('manage.authors.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Author Name</label>
                        <input type="text" name="author_name" class="form-control" id="name"
                            placeholder="Enter author name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-plus-square"></i>
                        Author</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}

{{-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#authorModal">
    <i class="fas fa-plus-square"></i> New Author
</button> --}}
