import './bootstrap';

import '../css/style.css';
import '../css/github-markdown-light.css';

import { loadMore } from './modules/loadMore';
import { initScoreComponent } from './features/blogs/score';
import { initThumbnailUpload } from './features/blogs/thumbnailUpload';

loadMore();
initScoreComponent();
initThumbnailUpload();

document.addEventListener('click', (e) => {
    const el = e.target.closest('[data-action]');
    if (!el) return;

    const action = el.dataset.action;

    if (action === 'notImplemented') {
        e.preventDefault();
        alert("これはまだ実装してないんだ。ごめんね！");
    }
});