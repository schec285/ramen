export function preventEnterSubmit(formId) {
    document.getElementById(formId).addEventListener('keydown', function (event) {
        if (event.target.tagName === 'TEXTAREA') return; // テキストエリア内のEnterは無視

        if (event.key === 'Enter') {
            event.preventDefault(); // Enterキーによるデフォルトのsubmit動作をキャンセル
        }
    });
}