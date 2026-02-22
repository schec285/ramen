@extends('layouts.app', ['hidePostBtn' => true])

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
                <form id="blog-post-form" method="POST" class="blog-post__form">
                    @csrf
                    <div class="blog-post__input-grid">
                        <label class="blog-post__label" for="store-name">店舗名<span class="required">*</span></label>
                        <input type="text" id="store-name" class="blog-post__input-text" name="store-name" placeholder="店舗名を入力" required>
                        <fieldset class="blog-post__address">
                            <legend class="visually-hidden">住所入力欄</legend>
                            <label class="blog-post__label" for="postalcode">郵便番号</label>
                            <div class="blog-post__postalcode">
                                <input type="text" inputmode="numeric" id="postalcode" class="blog-post__input-text" name="postalcode" minlength="7" maxlength="7" pattern="\d*" autocomplete="shipping postal-code" placeholder="0000000">
                                <button type="button" class="blog-post__search-address-btn btn">住所検索</button>
                            </div>
                            <label class="blog-post__label" for="prefecture">都道府県<span class="required">*</span></label>
                            <select id="prefecture" class="blog-post__prefecture" name="prefecture" required>
                                    <option value="" disabled selected>選択してください</option>
                                @foreach($prefectures as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            <label class="blog-post__label" for="city">市町村</label>
                            <input type="text" id="city" class="blog-post__input-text" name="city" placeholder="市町村を入力">
                            <label class="blog-post__label" for="town">住所</label>
                            <input type="text" id="town" class="blog-post__input-text" name="town" placeholder="住所を入力">
                        </fieldset>
                    </div>
<!--
                    <figure class="blog-post__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.4483700943483!2d139.79821637623232!3d35.715190028107024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188ec3b2f4da23%3A0xbe7d4695cdc73e01!2z44KJ44O844KB44KT5byB5oW2IOa1heiNieacrOW6lw!5e0!3m2!1sja!2sjp!4v1767522502164!5m2!1sja!2sjp" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </figure>
-->
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
                            <textarea id="body" name="body" class="blog-post__input-md" placeholder="本文を入力" spellcheck="false"></textarea>
                            <div id="md-preview" class="blog-post__markdown-preview hidden markdown-body"></div>
                        </div>
                    </div>
                    <div class="blog-post__input-grid">
                        <label class="blog-post__label">評価</label>
                        <div class="blog-post__score" data-component="score">
                            <input type="range" class="blog-post__score-range" min="0" max="100" name="score" value="50" data-role="input">
                            <div class="blog-post__score-label" data-role="label">
                                <span class="material-symbols-outlined star">star</span>
                                <span class="blog-post__score-value" data-role="value"></span>
                                <span>点</span>
                            </div>
                        </div>

                        <label class="blog-post__label" for="tag-input">タグ</label>
                        <div class="blog-post__tag">
                            <input type="text" id="tag-input" class="blog-post__input-text" placeholder="タグを入力">
                            <button type="button" id="add-tag" class="blog-post__add-tag-btn btn"><span class="material-symbols-outlined">add</span></button>
                        </div>
                        <div class="blog-post__tag-area">
                            <ul class="blog-post__tag-list tag-list" data-component="tag-list">
                                <template id="tag-template">
                                    <li class="blog-post__tag-item" data-role="tag">
                                        <div class="blog-post__tag-span c-tag">
                                            <span data-role="tag-value"></span>
                                            <button type="button" class="blog-post__del-tag-btn" data-action="delete-tag"><span class="material-symbols-outlined">close_small</span></button>
                                            <input type="hidden" data-role="tag-hidden-input"name="tags[]" value="">
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