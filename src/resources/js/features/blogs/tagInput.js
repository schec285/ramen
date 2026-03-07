export function initTag() {

    // 旧入力値のタグを復元
    restoreOldTag();

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

/*
 * 旧入力値のタグを復元する
 * フォーム送信後にバリデーションエラーなどで再度フォームが表示された際に、ユーザーが入力したタグを復元するための関数 
 */
function restoreOldTag() {
    const oldData = document.getElementById('old-data');
    const oldTags = JSON.parse(oldData.dataset.tags || '[]');
    const tagList = document.querySelector('[data-component="tag-list"]');
    const template = document.getElementById('tag-template');

    oldTags.forEach(tag => {
        const clone = template.content.cloneNode(true);
        clone.querySelector('[data-role="tag-value"]').textContent = tag;
        clone.querySelector('[data-role="tag-hidden-input"]').value = tag;
        tagList.appendChild(clone);
    });
}

/*
    * タグを追加する
    * ユーザーがタグを入力して追加ボタンを押した際に、タグをタグリストに追加するための関数 
*/
function addTag(tagvalue) {
    const tagList = document.querySelector('[data-component="tag-list"]');
    const template = document.getElementById('tag-template');
    if (!template) return;
    const clone = template.content.cloneNode(true);
    clone.querySelector('[data-role="tag-value"]').textContent = tagvalue;
    clone.querySelector('[data-role="tag-hidden-input"]').value = tagvalue;
    tagList.appendChild(clone);
}