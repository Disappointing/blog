@extends('layouts.app')
@section('content')
    <div class="row">
        @include('layouts._error')
        <form class="col s12" method="post" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="category_id" value="{{ $id }}" type="hidden">
            <div class="row">
                <div class="input-field col s12">
                    <input id="title" type="text" class="validate" name="title">
                    <label for="title">标题</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="body" class="materialize-textarea" name="body"></textarea>
                    <label for="body">内容</label>
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