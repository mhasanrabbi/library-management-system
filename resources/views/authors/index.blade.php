@extends('layouts.layout')
@section('content')
    <div id="content">
        @include('authors.partials.message')
        @include('authors.partials.nav')

        <div class="container">
            <div class="row">
                <div class="col mb-2">
                    <div class="text-right p-2" style="background-color: #f5f6fa">
                        <a href="{{ route('manage.authors.index') }}" type="button" class="btn btn-outline-primary"><i
                                class="fas fa-cog"></i>
                            Authors Manage</a>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                            data-target="#authorModal">
                            <i class="fas fa-plus-square"></i> New Author
                        </button>
                        <form action="" class="">
                            <input type="text" placeholder="Search author by name">
                            <button class="btn btn-outline-primary inline" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                @unless(count($authors) == 0)
                    @foreach ($authors as $author)
                        <div class="col-4 mb-3">
                            <div class="card">
                                <div class="card-body" style="background-color: #c7ecee">
                                    <h4 class="text-center" style="color: #535c68">{{ $author->author_name }}</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center" style="color: #eb4d4b">Authors not found</h4>
                            </div>
                        </div>
                    </div>
                @endunless
            </div>

            @include('authors.partials.pagination')
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

<!--Authors Modal -->
<div class="modal fade" id="authorModal" tabindex="-1" role="dialog" aria-labelledby="authorModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="authorModalLabel" style="color: #487eb0"><i class="fas fa-plus-square"></i>
                    New Author</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('authors.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Author Name</label>
                        <input type="text" name="author_name" class="form-control" id="name"
                            placeholder="Enter author name">
                        @error('author_name')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
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
</div>
