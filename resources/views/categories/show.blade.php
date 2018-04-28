@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="collection">
     @foreach($blogs as $blog)
         <a href="{{ route('blogs.show',$blog->id) }}" class="collection-item">{{ $blog->title }}</a>

     @endforeach
            </div>
        </div>
    </div>
@endsection