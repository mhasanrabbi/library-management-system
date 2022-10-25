@extends('layouts.layout')

@section('content')
    <div id="content">

        @include('authors.partials.nav')

        <div class="container">
            <div class="row">
                @unless(count($authors) == 0)
                    @foreach ($authors as $author)
                        <div class="col-4 mb-4">
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
