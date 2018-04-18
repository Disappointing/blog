@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col s12 l10">
            <div class="card white">
                <div class="card-content white-text">
                    <span class="card-title black-text text-black"><b>{{ $blog->title }}</b></span>
                    <p class="grey-text "> {{ $blog->created_at->diffForHumans() }}发布,更新于{{ $blog->updated_at->diffForHumans() }}
                        @Auth
                            <a href="{{ route('blogs.edit',$blog->id) }}" class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">edit</i></a>
                            <a  class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons" onclick="if(confirm('删除是不可恢复的，你确认要删除吗？'))$('#_delform').submit();">close</i></a>
                            <form action="{{ route('blogs.delete',$blog->id) }}"  method="post" id="_delform">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                            </form>

                        @endauth
                    </p>
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

    <div class="container" id="replyList">
        <div class="row">
            <div class="col s12 l10">
                <div class="card white">
                    <ul class="collection">
                        @foreach($replies as $reply)
                            <li class="collection-item avatar">
                                <i class="material-icons circle">perm_identity</i>
                                <span class="title ">
                                    {{ $reply->email }}
                                    @Auth
                                        <form style="display: inline" method="post" action="{{ route('blogs.reply_delete',$reply->id) }}">
                                             <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                        <button onclick="if(!confirm('你确认删除吗,此操作不可逆')) return false" type="submit" class="btn-floating  waves-effect waves-light red"><i class="material-icons">delete</i></button>
                                    </form>
                                    @endAuth
                                </span>
                                <p  class="secondary-content">
                                    发表于{{ $reply->created_at->diffForHumans() }}
                                    <a onclick="reply(this,'{{ $reply->id }}')"><i class="material-icons">reply</i></a>
                                </p>
                                <p>{{ $reply->content }}</p>
                                <p class="grey-text"></p>
                                <ul class="collection">
                                    @foreach($reply->children as $review)
                                        <li class="collection-item">
                                            <span class="title">
                                                {{ $review->email }}
                                                @Auth
                                                    <form style="display: inline" method="post" action="{{ route('blogs.reply_delete',$review->id) }}">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        {{ csrf_field() }}
                                                    <button onclick="if(!confirm('你确认删除吗,此操作不可逆')) return false" class="btn-floating  waves-effect waves-light red"><i class="material-icons">delete</i></button>
                                                </form>
                                                @endAuth
                                            </span>
                                            <p>{{ $review->content }}</p>
                                            <p class="grey-text">
                                                发表于{{ $review->created_at->diffForHumans() }}

                                            </p>

                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
    <div class="row">
        <form class="col s12 l10 white" method="post" action="{{ route('blogs.reply') }}">
            {{ csrf_field() }}
            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input  id="email" type="email" class="validate" name="email">
                    <label for="disabled">e-mail</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea name="content" class="materialize-textarea" placeholder="请勿发布不友善或者负能量的内容。与人为善，比聪明更重要！"></textarea>
                </div>
            </div>
            <div class="right-align">
                <button type="submit" class="btn waves-effect waves-light">提交
                    <i class="material-icons right">send</i></button>
            </div>

        </form>
    </div>
    </div>

<div id="reply" style="display: none">
    <div class="row" id="review">
        <form class="col s12 l10 white" method="post" action="{{ route('blogs.reply') }}">
            {{ csrf_field() }}
            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
            <input type="hidden" name="pid" id="pid" value="">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input  id="email" type="email" class="validate" name="email">
                    <label for="disabled">e-mail</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea name="content" class="materialize-textarea" placeholder="请勿发布不友善或者负能量的内容。与人为善，比聪明更重要！"></textarea>
                </div>
            </div>
            <div class="right-align">
                <button type="submit" class="btn waves-effect waves-light">提交
                    <i class="material-icons right">send</i></button>
            </div>

        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script>
            $('#body').find('img').addClass('materialboxed responsive-img');
            $(document).ready(function(){
                $('.materialboxed').materialbox();
            });

            function reply(obj,id) {
                var tmp = obj;
                $(tmp).parent().parent().parent().find("div").remove();
                $('#pid').val(id);
                $(tmp).parent().parent().append($("#reply").html());


            }
    </script>
@endsection