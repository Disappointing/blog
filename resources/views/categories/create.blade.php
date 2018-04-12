@extends('layouts.app')
@section('content')
    <div class="row">
        @include('layouts._error')
        <form class="col s12" method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12">
                    <input id="name" type="text" class="validate" name="name">
                    <label for="name">名称</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="description" class="materialize-textarea" name="description"></textarea>
                    <label for="description">描述</label>
                </div>
            </div>

            <div class="file-field input-field">
                <div class="btn">
                    <span>文件</span>
                    <input type="file" name="backimg" accept="image/*">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
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