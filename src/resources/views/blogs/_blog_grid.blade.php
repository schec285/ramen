@foreach ($blogs as $blog)
    @include('blogs._blog_card', ['blog' => $blog])
@endforeach