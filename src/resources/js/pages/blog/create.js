import { preventEnterSubmit } from '../../utils/formUtils';
import { initScore } from '../../features/blogs/scoreIndicator';
import { initThumbnailUpload } from '../../features/blogs/thumbnailUpload';
import { initMarkdown } from '../../features/blogs/markdown';
import { initTagInput } from '../../features/blogs/tagInput';

export function init() {
    preventEnterSubmit('blog-post-form');
    initScore();
    initThumbnailUpload();
    initMarkdown();
    initTagInput();
}