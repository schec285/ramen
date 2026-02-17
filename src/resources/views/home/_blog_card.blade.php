<article class="blog-grid__item">
    <a href="{{ route('blog', ['id' => $blog->id]) }}" class="blog-grid__link">
        <figure class="blog-grid__img">
            <img class="card-img" src="{{ asset('svg/steaming-bowl-svgrepo-com.svg') }}">
            <span class="blog-grid__score-label score-label {{ ($blog->score_theme)['bg'] }}">
                <span class="material-symbols-outlined star">star</span>
                <span class="blog-grid__score">{{ $blog->score }}</span>
            </span>
        </figure>
        <div class="blog-grid__heading">
            <div class="blog-grid__profile">
                <div class="blog-grid__icon">
                    <img class="icon" src="{{ $blog->user->icon_url }}">
                </div>
                <span>{{ $blog->user->user_name }}</span>
            </div>
            <div class="blog-grid__post-date">
                <span class="material-symbols-outlined">calendar_today</span>
                <time datetime="{{ $blog->created_at }}">{{ $blog->created_at->format('Y-m-d') }}</time>
            </div>
        </div>
        <div class="blog-grid__body">
            <div class="blog-grid__body-item">
                <span class="material-symbols-outlined">store</span>
                <p>{{ $blog->store_name }}</p>
            </div>
            <div class="blog-grid__body-item">
                <span class="material-symbols-outlined">ramen_dining</span>
                <p>{{ $blog->ramen_name }}</p>
                <span class="price-tag">{{ number_format($blog->price) }}</span>
            </div>
            <div class="blog-grid__body-item blog-grid__location">
                <span class="material-symbols-outlined">location_on</span>
                <p>{{ $blog->full_address }}</p>
            </div>
        </div>
        <ul class="blog-grid__tag-list tag-list">
            @foreach ($blog->tags as $tag)
                <li><span class="c-tag">{{ $tag->name }}</span></li>
            @endforeach
        </ul>
    </a>
</article>