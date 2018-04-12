@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col s12 l3">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{ $category->backimg }}">
                            <span class="card-title">{{ $category->name }}</span>

                        </div>
                        <div class="card-content">
                            <p>{{ $category->description }}</p>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('categories.show',$category->id) }}">查看</a>
                            @auth<a href="{{ route('blogs.create',$category->id) }}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>@endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection