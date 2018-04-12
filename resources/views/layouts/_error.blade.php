@if (count($errors) > 0)
    <div class="col s12">
            <ul class="collection ">
                @foreach($errors->all() as $error)
                    <li class="collection-item">{{ $error }}</li>
                @endforeach
            </ul>
    </div>
@endif