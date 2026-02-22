export function initTagInput() {
    // タグ追加ボタンのイベントリスナーを設定
    const addTagBtn = document.getElementById('add-tag');
    addTagBtn.addEventListener('click', () => {
        const tagInput = document.getElementById('tag-input');
        const tagValue = tagInput ? tagInput.value.trim() : '';
        if (!tagInput || !tagValue) return;
        addTag(tagValue);
        tagInput.value = '';
    });

    // タグ削除ボタンのイベントリスナーを設定
    document.querySelector('[data-component="tag-list"]').addEventListener('click', (e) => {
        const deleteBtn = e.target.closest('[data-action="delete-tag"]');
        if (!deleteBtn) return;

        const tagItem = deleteBtn.closest('[data-role="tag"]');
        tagItem?.remove();
    });
}

function addTag(tagvalue) {
    const tagList = document.querySelector('[data-component="tag-list"]');
    const template = document.getElementById('tag-template');
    if (!template) return;
    const clone = template.content.cloneNode(true);
    clone.querySelector('[data-role="tag-value"]').textContent = tagvalue;
    clone.querySelector('[data-role="tag-hidden-input"]').value = tagvalue;
    tagList.appendChild(clone);
}