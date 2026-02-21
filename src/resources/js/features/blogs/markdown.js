import MarkdownIt from 'markdown-it';
import markdownItTaskLists from 'markdown-it-task-lists';

const md = new MarkdownIt({
    html: false,      // ユーザー投稿なのでfalse
    linkify: true,
    breaks: true,
})
    .use(markdownItTaskLists);

document.addEventListener('DOMContentLoaded', () => {

    const textarea = document.getElementById('body');
    const preview = document.getElementById('md-preview');
    const writeTab = document.getElementById('write');
    const previewTab = document.getElementById('preview');

    if (!textarea || !preview) return;

    const renderPreview = () => {
        preview.innerHTML = md.render(textarea.value);
    };

    // 入力時リアルタイム更新
    textarea.addEventListener('input', renderPreview);

    // タブ切り替え
    writeTab.addEventListener('click', () => {
        textarea.classList.remove('hidden');
        preview.classList.add('hidden');
        writeTab.classList.add('blog-post__tab-btn--active');
        previewTab.classList.remove('blog-post__tab-btn--active');
    });

    previewTab.addEventListener('click', () => {
        renderPreview();
        textarea.classList.add('hidden');
        preview.classList.remove('hidden');
        previewTab.classList.add('blog-post__tab-btn--active');
        writeTab.classList.remove('blog-post__tab-btn--active');
    });

});