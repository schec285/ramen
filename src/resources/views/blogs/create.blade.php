@extends('layouts.app', ['hidePostBtn' => true,])

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
        <section id="blog-post" class="blog-post section">
            <div class="container">
                <form id="blog-post-form" method="POST" class="blog-post__form" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div id="old-data" data-tags='@json(old("tags", []))'></div>
                    @if ($errors->any())
                        <div class="error">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="error__text">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <div class="blog-post__input-grid">
                        <label class="blog-post__label @error('store_name') error__text @enderror" for="store-name">店舗名</label>
                        <input type="text" id="store-name" class="blog-post__input" name="store_name" value="{{ old('store_name') }}" placeholder="店舗名を入力" required>
                        <label class="blog-post__label @error('ramen_name') error__text @enderror" for="ramen-name">ラーメン名</label>
                        <input type="text" id="ramen-name" class="blog-post__input" name="ramen_name" value="{{ old('ramen_name') }}" placeholder="ラーメン名を入力" required>
                        <label class="blog-post__label @error('price') error__text @enderror" for="ramen-price">価格</label>
                        <input type="number" id="ramen-price" class="blog-post__input" name="price" value="{{ old('price') }}" min="0" required>
                    </div>

                    <figure class="blog-post__map">
                        <gmp-map center="35.681236,139.767125" zoom="12"map-id="DEMO_MAP_ID">
                            <div class="blog-post__place-autocomplete-card" slot="control-inline-start-block-start">
                                <gmp-place-autocomplete placeholder="場所を検索"></gmp-place-autocomplete>
                            </div>
                        </gmp-map>
                        <input type="hidden" id="lat" name="latitude">
                        <input type="hidden" id="lng" name="longitude">
                    </figure>

                    <div class="blog-post__upload">
                        <div class="blog-post__upload-area">
                            <label class="blog-post__upload-btn btn" for="thumbnail">
                                <div class="blog-post__upload-caption">
                                    <div class="blog-post__upload-icon">
                                        <span class="material-symbols-outlined">upload</span>
                                    </div>
                                    <span class="blog-post__upload-label">サムネイルをアップロード</span>
                                    <span class="blog-post__upload-hint">クリックまたはドラッグ&ドロップ</span>
                                </div>
                                <img class="blog-post__preview-thumbnail" src="">
                                <input type="file" id="thumbnail" class="blog-post__upload-thumbnail" accept="image/*">
                            </label>
                        </div>
                    </div>
                    <div class="blog-post__body">
                        <div class="blog-post__tab">
                            <div class="blog-post__tab-nav">
                                <button type="button" id="write" class="blog-post__tab-btn blog-post__tab-btn--active" role="tab">編集</button>
                                <button type="button" id="preview" class="blog-post__tab-btn" role="tab">プレビュー</button>
                            </div>
                        </div>
                        <div class="blog-post__md">
                            <textarea id="body" name="body" class="blog-post__input-md" placeholder="本文を入力" spellcheck="false">{{ old('body', '') }}</textarea>
                            <div id="md-preview" class="blog-post__markdown-preview hidden markdown-body"></div>
                        </div>
                    </div>
                    <div class="blog-post__input-grid">
                        <label class="blog-post__label @error('score') error__text @enderror">評価</label>
                        <div class="blog-post__score" data-component="score">
                            <input type="range" class="blog-post__score-range" min="0" max="100" name="score" value="{{ old('score', 50) }}" data-role="input">
                            <div class="blog-post__score-label" data-role="label">
                                <span class="material-symbols-outlined star">star</span>
                                <span class="blog-post__score-value" data-role="value"></span>
                                <span>点</span>
                            </div>
                        </div>

                        <label class="blog-post__label @error('tags') error__text @enderror" for="tag-input">タグ</label>
                        <div class="blog-post__tag">
                            <input type="text" id="tag-input" class="blog-post__input" placeholder="タグを入力">
                            <button type="button" id="add-tag" class="blog-post__add-tag-btn btn"><span class="material-symbols-outlined">add</span></button>
                        </div>
                        <div class="blog-post__tag-area">
                            <ul class="blog-post__tag-list tag-list" data-component="tag-list">
                                <template id="tag-template">
                                    <li class="blog-post__tag-item" data-role="tag">
                                        <div class="blog-post__tag-span c-tag">
                                            <span data-role="tag-value"></span>
                                            <button type="button" class="blog-post__del-tag-btn" data-action="delete-tag"><span class="material-symbols-outlined">close_small</span></button>
                                            <input type="hidden" data-role="tag-hidden-input" name="tags[]">
                                        </div>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                    <div class="blog-post__form-action blog-post__form-action--top">
                        <button type="button" class="blog-post__save-btn btn" data-action="not-implemented">一時保存</button>
                        <button type="button" class="blog-post__submit-btn btn" data-action="submit">投稿</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection