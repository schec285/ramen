@extends('layouts.app')

@section('content')
        <section id="mv" class="mv section">
        <div class="container">
            <div class="mv__inner">
                <div class="mv__heading">
                    <h2 class="mv__title">
                        <span class="material-symbols-outlined">trending_up</span>
                        <span>日本のラーメン文化を探求する</span>
                    </h2>
                    <h3 class="mv__subtitle">最高のラーメンを見つける旅</h3>
                    <p class="mv__text">全国のラーメン店を巡り、ラーメン文化を深く掘り下げます。 美味しいラーメンとの出会いをシェアしましょう。</p>
                </div>
                <div class="mv__btn">
                    <a href="#" class="btn mv__more-btn">人気記事を読む</a>
                </div>
            </div>
        </div>
    </section>

    <main class="content">
        <section id="blog" class="blog section">
            <div class="container">
                <div class="blog-grid">
                    @foreach ($blogs as $blog)
                        <article class="blog-grid__item">
                            <a href="#" class="blog-grid__link">
                                <figure class="blog-grid__img">
                                    <img class="card-img" src="{{ Storage::url($blog->path) }}">
                                    <span class="blog-grid__score-label score-label {{ ($blog->score_theme)['bg'] }}">
                                        <span class="material-symbols-outlined star">star</span>
                                        <span class="blog-grid__score">{{ $blog->score }}</span>
                                    </span>
                                </figure>
                                <div class="blog-grid__heading">
                                    <div class="blog-grid__profile">
                                        <div class="blog-grid__icon">
                                            <img class="icon" src="{{ Storage::url($blog->user->icon_path) }}">
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
                    @endforeach
                </div>
            </div>
        </section>
        <div class="blog__btn">
            <button class="btn blog__more">もっと見る</button>
        </div>
@endsection