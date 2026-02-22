export function initScore() {
    document.querySelectorAll('[data-component="score"]').forEach(component => {
        const input = component.querySelector('[data-role="input"]');
        const valueEl = component.querySelector('[data-role="value"]');
        const labelEl = component.querySelector('[data-role="label"]');

        const scoreColorClass = {
            perfect: 'score--perfect-text',
            excellent: 'score--excellent-text',
            good: 'score--good-text',
            medium: 'score--medium-text',
            fair: 'score--fair-text',
            poor: 'score--poor-text',
        };

        function update() {
            const value = Number(input.value);
            valueEl.textContent = value;

            labelEl.classList.remove(...Object.values(scoreColorClass));

            if (value === 100) labelEl.classList.add(scoreColorClass.perfect);
            else if (value >= 90) labelEl.classList.add(scoreColorClass.excellent);
            else if (value >= 80) labelEl.classList.add(scoreColorClass.good);
            else if (value >= 70) labelEl.classList.add(scoreColorClass.medium);
            else if (value >= 50) labelEl.classList.add(scoreColorClass.fair);
            else labelEl.classList.add(scoreColorClass.poor);
        }

        input.addEventListener('input', update);
        update(); // 初期描画
    });
}