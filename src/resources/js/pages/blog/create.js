import '../../../css/pages/blog/create.css';
import 'github-markdown-css/github-markdown-light.css';
import { preventEnterSubmit, setupSubmitWithPreview } from '../../utils/formUtils';
import { initScore } from '../../features/blogs/scoreIndicator';
import { initThumbnailUpload } from '../../features/blogs/thumbnailUpload';
import { initMarkdown } from '../../features/blogs/markdown';
import { initTag } from '../../features/blogs/tagInput';
import { initLoadGoogleMapsAPI } from '../../features/blogs/mapsJsAPI';


export function init() {
    preventEnterSubmit('blog-post-form');
    setupSubmitWithPreview('blog-post-form', '[data-action="submit"]');
    initScore();
    initThumbnailUpload();
    initMarkdown();
    initTag();
    initLoadGoogleMapsAPI();
}