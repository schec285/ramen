export function initThumbnailUpload() {
    // ドラッグ＆ドロップ
    const dropArea = document.querySelector('.blog-post__upload-btn');
    const fileInput = document.getElementById('thumbnail');
    const dragClass = 'is-dragover';

    dropArea.addEventListener('dragover', e => {
        e.preventDefault();
        dropArea.classList.add(dragClass);
    });

    dropArea.addEventListener('dragleave', () => {
        dropArea.classList.remove(dragClass);
    });

    dropArea.addEventListener('drop', e => {
        e.preventDefault();
        dropArea.classList.remove(dragClass);

        const file = e.dataTransfer.files[0];
        fileInput.files = e.dataTransfer.files;

        showPreview(file);
    });

    // ファイル選択時のプレビュー表示
    fileInput.addEventListener('change', () => {
        const file = fileInput.files[0];
        showPreview(file);
    });

    function showPreview(file) {
        const reader = new FileReader();
        const previewElement = document.querySelector('.blog-post__preview-thumbnail');
        const uploadCaption = document.querySelector('.blog-post__upload-caption');
        reader.onload = e => {
            previewElement.src = e.target.result;
            previewElement.style.display = 'block';
            uploadCaption.style.display = 'none';
        };
        reader.readAsDataURL(file);
    }
}