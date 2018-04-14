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
@endsection

@section('scripts')
    <script>
            $('#body').find('img').addClass('materialboxed responsive-img');
            $(document).ready(function(){
                $('.materialboxed').materialbox();
            });
    </script>
@endsection