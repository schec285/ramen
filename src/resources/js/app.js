import '../css/style.css';

import { PAGE_MODULES } from './constants/pageModules';

document.addEventListener('DOMContentLoaded', () => {
    // ページごとの初期化
    const page = document.body.dataset.page;
    if (!PAGE_MODULES[page]) return;

    PAGE_MODULES[page]().then(module => {
        module.init();
    });
});

document.addEventListener('click', (e) => {
    const el = e.target.closest('[data-action]');
    if (!el) return;

    const action = el.dataset.action;

    if (action === 'not-implemented') {
        e.preventDefault();
        alert("これはまだ実装してないんだ。ごめんね！");
    }
});