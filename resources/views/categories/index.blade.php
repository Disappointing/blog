@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 885px;">
            @foreach($categories as $category)
                    <div class="card small">
                        <div class="card-image">
                            <a href="{{ route('categories.show',$category->id) }}">
                                <img src="{{ $category->backimg }}" >
                                <span class="card-title">{{ $category->name }}</span>
                            </a>

                        </div>
                        <div class="card-content">
                            <p>{{ $category->description }}</p>
                        </div>
                        <div class="card-action">
                           <span><i style="position: relative;top: 6px;" class="material-icons">av_timer</i><b >{{ $category->created_at->diffForHumans() }}</b></span>
                            @auth
                            <!-- Dropdown Trigger -->
                            <a style="float: right" class='dropdown-button   waves-effect waves-light btn-flat' href='#' data-activates='dropdown1'><i class="material-icons">settings</i></a>

                            <!-- Dropdown Structure -->
                            <ul id='dropdown1' class='dropdown-content'>
                                <li><a href="{{ route('blogs.create',$category->id) }}">添加</a></li>
                                <li><a href="{{ route('blogs.edit',$category->id) }}">编辑</a></li>
                                <li class="divider"></li>
                                <form style="display: inline" action="{{ route('categories.delete',$category->id) }}"  method="post" id="_delform">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{ csrf_field() }}
                                <li><button style="width: 100%"  type="submit" class="btn halfway-fab waves-effect waves-light red" onclick="if(!confirm('你确认删除吗,此操作不可逆')) return false"><i class="material-icons">close</i></button></li>
                                </form>
                            </ul>
                            @endauth
                        </div>
                    </div>
            @endforeach
    </div>
@endsection