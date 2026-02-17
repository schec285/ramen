export function loadMore() {
    /**
     * ブログ一覧を取得して表示する
     */
    let currentPage = 1;
    let lastPage = 3;
    let isLoading = false;

    document.addEventListener('click', async (e) => {

        const el = e.target.closest('[data-action="getBlog"]');
        if (!el) return;

        if (isLoading) return;
        if (lastPage && currentPage >= lastPage) return;

        isLoading = true;
        const loader = document.querySelector('#loader');
        el.classList.add('hidden');
        loader.classList.remove('hidden');

        try {
            const baseUrl = el.dataset.url;

            const response = await fetch(`${baseUrl}?page=${currentPage + 1}`);
            const html = await response.text();

            if (!html.trim()) {
                el.remove();
                return;
            }

            document
                .querySelector('#blog-list')
                .insertAdjacentHTML('beforeend', html);

            currentPage++;
            if (currentPage >= lastPage) {
                el.remove();
            }

        } catch (error) {
            console.error(error);
        } finally {
            isLoading = false;
            loader.classList.add('hidden');    // 非表示
            el.classList.remove('hidden');
        }
    });
}