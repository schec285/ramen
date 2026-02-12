@foreach ($blogs as $blog)
    @include('home._blog_card', ['blog' => $blog])
@endforeach