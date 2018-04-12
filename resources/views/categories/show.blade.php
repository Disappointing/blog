@extends('layouts.app')
@section('content')
     @foreach($blogs as $blog)
         {{ $blog->title }}
     @endforeach
@endsection