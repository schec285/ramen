import 'github-markdown-css/github-markdown-light.css';
import { preventEnterSubmit, setupSubmitWithPreview } from '../../utils/formUtils';
import { initScore } from '../../features/blogs/scoreIndicator';
import { initThumbnailUpload } from '../../features/blogs/thumbnailUpload';
import { initMarkdown } from '../../features/blogs/markdown';
import { initTagInput } from '../../features/blogs/tagInput';

export function init() {
    preventEnterSubmit('blog-post-form');
    setupSubmitWithPreview('blog-post-form', '[data-action="submit"]');
    initScore();
    initThumbnailUpload();
    initMarkdown();
    initTagInput();
}