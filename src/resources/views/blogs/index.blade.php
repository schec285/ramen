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
                    <a href="#" class="btn mv__more-btn" data-action="not-implemented">人気記事を読む</a>
                </div>
            </div>
        </div>
    </section>

    <main class="content">
        <section id="blog" class="blog section">
            <div class="container">
                <div id="blog-list" class="blog-grid">
                    @include('blogs._blog_grid')
                </div>
            </div>
        </section>
        <div class="blog__btn">
            <button class="btn blog__more" data-action="get-blog" data-url="{{ route('blogs.loadMore') }}" data-last-page="{{ $blogs->lastPage() }}">もっと見る</button>
            <div id="loader" class="spinner hidden"></div>
        </div>
    </main>
@endsection