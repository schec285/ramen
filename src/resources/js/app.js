import './bootstrap';

import '../css/style.css';
import '../css/github-markdown-light.css';

document.addEventListener('click', (e) => {
    const el = e.target.closest('[data-action]');
    if (!el) return;

    const action = el.dataset.action;

    if (action === 'notImplemented') {
        e.preventDefault();
        alert("これはまだ実装してないんだ。ごめんね！");
    }
});
