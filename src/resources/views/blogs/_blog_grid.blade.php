@forelse ($blogs as $blog)
    @include('blogs._blog_card', ['blog' => $blog])
@empty
    <p>投稿はまだありません。</p>
@endforelse
