@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop
@section('content')
    <div class="row">
        @include('layouts._error')
        @if($blog->id)
            <form class="col s12" method="POST" action="{{ route('blogs.update',$blog->id) }}">
            <input type="hidden" name="_method" value="PUT">
        @else
            <form class="col s12" method="post" action="{{ route('blogs.store') }}">
            <input name="category_id" value="{{ $id }}" type="hidden">
        @endif
            {{ csrf_field() }}

            <div class="row">
                <div class="input-field col s12">
                    <input id="title" type="text" class="validate" name="title" value="{{ old('title', $blog->title ) }}">
                    <label for="title">标题</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="body" class="materialize-textarea" name="body">{{ old('title', $blog->body ) }}</textarea>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="waves-effect waves-light btn">提交</button>
                </div>
            </div>

        </form>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript"  src="{{ asset('js/module.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/uploader.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/simditor.js') }}"></script>

    <script>
        $(document).ready(function(){
            var editor = new Simditor({
                textarea: $('#body'),
                upload: {
                    url: '{{ route('blogs.upload_img') }}',
                    params:{ _token: '{{ csrf_token() }}' },
                    fileKey: 'upload_file',
                    connectionCount: 3,
                    leaveConfirm: '文件上传中，关闭此页面将取消上传。'
                },
                pasteImage: true,
            });
        });
    </script>

@stop