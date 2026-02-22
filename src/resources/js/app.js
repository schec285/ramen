import '../css/style.css';
import 'github-markdown-css/github-markdown-light.css';

const pageModules = {
    'blog-index': () => import('./pages/blog/index'),
    'blog-show': () => import('./pages/blog/show'),
    'blog-create': () => import('./pages/blog/create'),
};

document.addEventListener('DOMContentLoaded', () => {
    // ページごとの初期化
    const page = document.body.dataset.page;
    if (!pageModules[page]) return;

    pageModules[page]().then(module => {
        module.init();
    });
});

document.addEventListener('click', (e) => {
    const el = e.target.closest('[data-action]');
    if (!el) return;

    const action = el.dataset.action;

    if (action === 'notImplemented') {
        e.preventDefault();
        alert("これはまだ実装してないんだ。ごめんね！");
    }
});