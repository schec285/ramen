import MarkdownIt from 'markdown-it';
import markdownItTaskLists from 'markdown-it-task-lists';

export function initMarkdown() {

    const md = new MarkdownIt({
        html: false,
        linkify: true,
        breaks: true,
    }).use(markdownItTaskLists);

    const textarea = document.getElementById('body');
    const preview = document.getElementById('md-preview');
    const writeTab = document.getElementById('write');
    const previewTab = document.getElementById('preview');

    if (!textarea || !preview) return;

    const renderPreview = () => {
        preview.innerHTML = md.render(textarea.value);
    };

    textarea.addEventListener('input', renderPreview);

    writeTab?.addEventListener('click', () => {
        textarea.classList.remove('hidden');
        preview.classList.add('hidden');
        writeTab.classList.add('blog-post__tab-btn--active');
        previewTab.classList.remove('blog-post__tab-btn--active');
    });

    previewTab?.addEventListener('click', () => {
        renderPreview();
        textarea.classList.add('hidden');
        preview.classList.remove('hidden');
        previewTab.classList.add('blog-post__tab-btn--active');
        writeTab.classList.remove('blog-post__tab-btn--active');
    });
}