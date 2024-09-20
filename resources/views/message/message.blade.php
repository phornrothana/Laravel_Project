{{-- Any Error --}}
@if (count($errors))
     @foreach ($errors->all() as $error)
        <blockquote class="blockquote blockquote-danger">
            <p>{{ @$error}}</p>
            <footer class="blockquote-ffoter"><cite title="Source Title">Please Check again</cite></footer>
        </blockquote>
     @endforeach
@endif
