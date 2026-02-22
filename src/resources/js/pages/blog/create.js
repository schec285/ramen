import { initScore } from '../../features/blogs/scoreIndicator';
import { initThumbnailUpload } from '../../features/blogs/thumbnailUpload';
import { initMarkdown } from '../../features/blogs/markdown';

export function init() {
    initScore();
    initThumbnailUpload();
    initMarkdown();
}