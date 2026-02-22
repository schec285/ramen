export function preventEnterSubmit(formId) {
    document.getElementById(formId).addEventListener('keydown', function (event) {
        if (event.target.tagName === 'TEXTAREA') return; // テキストエリア内のEnterは無視

        if (event.key === 'Enter') {
            event.preventDefault(); // Enterキーによるデフォルトのsubmit動作をキャンセル
        }
    });
}

// 確認画面 + submit 制御
export function setupSubmitWithPreview(formId, submitBtn, onPreview = null) {
    const form = document.getElementById(formId);
    document.querySelector(submitBtn).addEventListener('click', () => {
        // ブラウザでバリデーションチェックを行って、問題がなければ onPreview を呼び出す
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }
        if (onPreview != null) {
            onPreview();
        } else {
            if (confirm('投稿しますか？')) {
                form.submit();
            }
        }
    });
}