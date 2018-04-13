@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col s12 l10">
            <div class="card white">
                <div class="card-content white-text">
                    <span class="card-title black-text text-black"><b>{{ $blog->title }}</b></span>
                    <p class="grey-text "> {{ $blog->created_at->diffForHumans() }}发布</p>
                </div>
                <div class="card-action body" id="body">
                    {!! $blog->body !!}
                </div>
            </div>
        </div>
        <div class="col s12 l2 card white">
            <div class="collection">

                @foreach($blogs as $blog)
                    <a href="{{ route('blogs.show',$blog->id) }}" class="collection-item">{{ $blog->title }}</a>

                @endforeach
            </div>

        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script>
            $('#body').find('img').addClass('materialboxed responsive-img');
            $(document).ready(function(){
                $('.materialboxed').materialbox();
            });
    </script>
@endsection