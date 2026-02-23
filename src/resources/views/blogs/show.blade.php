@extends('layouts.app')

@section('content')
    <div class="page-actions">
        <div class="container">
            <a class="back btn" href="{{ route('blogs.index') }}">
                <span class="material-symbols-outlined">arrow_back</span>
                <span>戻る</span>
            </a>
        </div>
    </div>
    <main class="content">
        <section id="blog-detail" class="blog-detail section">
            <div class="container">
                <div class="blog__inner">
                    <article class="blog-detail__article">
                        <figure class="blog-detail__figure">
                            <button class="blog-detail__picture" data-action="notImplemented">
                                <div class="blog-detail__score-box score-label {{ ($blog->score_theme)['bg'] }}">
                                    <span class="material-symbols-outlined star">star</span>
                                    <span class="blog-detail__score-label">{{ $blog->score }}点</span>
                                </div>
                                <img class="blog-detail__image" src="{{ $blog->thumbnail_image_url ?? asset('svg/steaming-bowl-svgrepo-com.svg') }}">
                                <div class="blog-detail__zoom-icon">
                                    <span class="material-symbols-outlined">zoom_in</span>
                                </div>
                            </button>
                        </figure>
                        <div class="blog-detail__content">
                            <div class="blog-detail__main">
                                <div class="blog-detail__meta">
                                    <div class="blog-detail__icon">
                                        <img class="icon" src="{{ $blog->user->icon_url ?? assert('svg/steaming-bowl-svgrepo-com.svg') }}">
                                    </div>
                                    <div class="blog-detail__created">
                                        <span class="blog-detail__user-name">{{ $blog->user->user_name }}</span>
                                        <div class="blog-detail__date">
                                            <span class="material-symbols-outlined">calendar_today</span>
                                            <time datetime="{{ $blog->created_at }}">{{ $blog->created_at->format('Y年m月d日') }}</time>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-detail__tags">
                                    <ul class="blog-detail__tag-list tag-list">
                                        @foreach ($blog->tags as $tag)
                                            <li><span class="c-tag">{{ $tag->name }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="blog-detail__body">
                                    <div class="markdown-body">
                                        {!! nl2br(e($blog->body)) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="blog-detail__store">
                                <h2 class="blog-detail__store-heading">
                                    <span class="material-symbols-outlined">location_on</span>
                                    <span class="blog-detail__store-label">店舗情報</span>
                                </h2>
                                <dl class="blog-detail__store-info">
                                    <dt class="blog-detail__store-term">店舗名</dt>
                                    <dd class="blog-detail__store-value">{{ $blog->store_name }}</dd>
                                    
                                    <dt class="blog-detail__store-term">郵便番号</dt>
                                    <dd class="blog-detail__store-value">〒{{ $blog->postal_code }}</dd>
                                    <dt class="blog-detail__store-term">住所</dt>
                                    <dd class="blog-detail__store-value">{{ $blog->full_address }}</dd>
                                </dl>
                                {{-- TODO: 未実装
                                <div class="blog-detail__store-map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.4483700943483!2d139.79821637623232!3d35.715190028107024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188ec3b2f4da23%3A0xbe7d4695cdc73e01!2z44KJ44O844KB44KT5byB5oW2IOa1heiNieacrOW6lw!5e0!3m2!1sja!2sjp!4v1767522502164!5m2!1sja!2sjp" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    <a class="blog-detail__store-link btn" href="https://maps.app.goo.gl/TyyTT7MnbgJiMXc59" target="_blank" rel="noopener noreferrer">
                                        <span class="material-symbols-outlined">location_on</span>
                                        <span>Google Mapsで開く</span>
                                    </a>
                                </div>
                                 --}}
                            </div>

{{-- TODO: 未実装
                            <div class="blog-detail__actions">
                                <div class="blog-detail__favorite">
                                    <button class="blog-detail__favorite-btn btn"><span class="material-symbols-outlined">favorite</span></button>
                                    <div class="blog-detail__favorite-info">
                                        <span class="blog-detail__favorite-count">100</span>
                                        <span class="blog-detail__favorite-label">いいね！</span>
                                    </div>
                                </div>
                                <div class="blog-detail__bookmark">
                                    <button class="blog-detail__bookmark-btn btn"><span class="material-symbols-outlined btn">bookmark</span></button>
                                    <span class="blog-detail__bookmark-label">保存</span>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <section id="blog-comment" class="blog-comment section">
            <div class="container">
                <div class="blog__inner">
                    <h2 class="blog-comment__heading">コメント(3)</h2>
                    <form name="blog-comment">
                        <textarea class="comment-textarea" requreid placeholder="コメントを入力..." rows="4"></textarea>
                        <div class="blog-comment__btn-area">
                            <button class="blog-comment__submit-btn btn"><span class="material-symbols-outlined">send</span></button>
                        </div>
                    </form>
                    <article class="blog-comment__box">
                        <div class="blog-comment__main">
                            <div class="blog-comment__icon">
                                <img class="icon" src="sample-img/user-icon.png">
                            </div>
                            <div class="blog-comment__area">
                                <div class="blog-comment__body">
                                    <div class="blog-comment__meta">
                                        <span class="blog-comment__user-name">山田 太郎</span>
                                        <span class="blog-comment__date-info">1日前</span>
                                    </div>
                                    <p>こんにちは、ここにコメントを残します。こんにちは、ここにコメントを残します。こんにちは、ここにコメントを残します。こんにちは、ここにコメントを残します。</p>
                                    <p>こんにちは、ここにコメントを残します。</p>
                                    <p>こんにちは、ここにコメントを残します。</p>
                                    <p>こんにちは、ここにコメントを残します。</p>
                                </div>
                                <div class="blog-comment__action">
                                    <div class="blog-comment__good">
                                        <button class="blog-comment__good-btn btn"><span class="material-symbols-outlined">thumb_up</span></button><span class="blog-comment__good-count">3</span>
                                    </div>
                                    <button class="blog-comment__reply-btn btn">返信</button>
                                    <button class="blog-comment__show-reply-btn btn"><span class="material-symbols-outlined">subdirectory_arrow_right</span>返信を閉じる</button>
                                </div>
                                <textarea class="comment-textarea" requreid placeholder="返信を入力..." rows="3"></textarea>
                                <div class="blog-comment__btn-area">
                                    <button class="blog-comment__cancel-btn btn"><span class="material-symbols-outlined">delete</span></button>
                                    <button class="blog-comment__submit-btn btn"><span class="material-symbols-outlined">prompt_suggestion</span></button>
                                </div>

                                <div class="blog-comment__reply-area">
                                    <div class="blog-comment__reply">
                                        <div class="blog-comment__icon">
                                            <img class="icon" src="sample-img/user-icon.png">
                                        </div>
                                        <div class="blog-comment__area">
                                            <div class="blog-comment__body blog-comment__body--reply">
                                                <div class="blog-comment__meta">
                                                    <div class="blog-comment__reply-info">
                                                        <span class="material-symbols-outlined">subdirectory_arrow_right</span>
                                                        <span class="blog-comment__user-name">佐藤 花子</span>
                                                    </div>
                                                    <span class="blog-comment__date-info">12時間前</span>
                                                </div>
                                                <p>返信コメントの例です。返信コメントの例です。</p>
                                            </div>
                                            <div class="blog-comment__action">
                                                <div class="blog-comment__good">
                                                    <button class="blog-comment__good-btn btn"><span class="material-symbols-outlined">thumb_up</span></button><span class="blog-comment__good-count">1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="blog-comment__reply">
                                        <div class="blog-comment__icon">
                                            <img class="icon" src="sample-img/user-icon.png">
                                        </div>
                                        <div class="blog-comment__area">
                                            <div class="blog-comment__body blog-comment__body--reply">
                                                <div class="blog-comment__meta">
                                                    <div class="blog-comment__reply-info">
                                                        <span class="material-symbols-outlined">subdirectory_arrow_right</span>
                                                        <span class="blog-comment__user-name">佐藤 花子</span>
                                                    </div>
                                                    <span class="blog-comment__date-info">12時間前</span>
                                                </div>
                                                <p>返信コメントの例です。返信コメントの例です。</p>
                                            </div>
                                            <div class="blog-comment__action">
                                                <div class="blog-comment__good">
                                                    <button class="blog-comment__good-btn btn"><span class="material-symbols-outlined">thumb_up</span></button><span class="blog-comment__good-count">1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="blog-comment__main">
                            <div class="blog-comment__icon">
                                <img class="icon" src="sample-img/user-icon.png">
                            </div>
                            <div class="blog-comment__area">
                                <div class="blog-comment__body">
                                    <div class="blog-comment__meta">
                                        <span class="blog-comment__user-name">山田 太郎</span>
                                        <span class="blog-comment__date-info">1日前</span>
                                    </div>
                                    <p>こんにちは、ここにコメントを残します。こんにちは、ここにコメントを残します。こんにちは、ここにコメントを残します。こんにちは、ここにコメントを残します。</p>
                                    <p>こんにちは、ここにコメントを残します。</p>
                                    <p>こんにちは、ここにコメントを残します。</p>
                                    <p>こんにちは、ここにコメントを残します。</p>
                                </div>
                                <div class="blog-comment__action">
                                    <div class="blog-comment__good">
                                        <button class="blog-comment__good-btn btn"><span class="material-symbols-outlined">thumb_up</span></button><span class="blog-comment__good-count">3</span>
                                    </div>
                                    <button class="blog-comment__reply-btn btn">返信</button>
                                    <button class="blog-comment__show-reply-btn btn"><span class="material-symbols-outlined">subdirectory_arrow_right</span>返信を見る(2件)</button>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
--}}

    </main>
@endsection