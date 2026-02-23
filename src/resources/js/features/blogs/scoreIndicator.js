export function initScore() {
    document.querySelectorAll('[data-component="score"]').forEach(component => {
        const elements = {
            input: component.querySelector('[data-role="input"]'),
            valueEl: component.querySelector('[data-role="value"]'),
            labelEl: component.querySelector('[data-role="label"]'),
        };
        elements.input.addEventListener('input', () => update(elements));
        update(elements); // 初期描画
    });
}

const SCORE_COLOR_CLASSES = {
    perfect: 'score--perfect-text',
    excellent: 'score--excellent-text',
    good: 'score--good-text',
    medium: 'score--medium-text',
    fair: 'score--fair-text',
    poor: 'score--poor-text',
};

function update({ input, valueEl, labelEl }) {
    const value = Number(input.value);
    valueEl.textContent = value;

    labelEl.classList.remove(...Object.values(SCORE_COLOR_CLASSES));

    if (value === 100) labelEl.classList.add(SCORE_COLOR_CLASSES.perfect);
    else if (value >= 90) labelEl.classList.add(SCORE_COLOR_CLASSES.excellent);
    else if (value >= 80) labelEl.classList.add(SCORE_COLOR_CLASSES.good);
    else if (value >= 70) labelEl.classList.add(SCORE_COLOR_CLASSES.medium);
    else if (value >= 50) labelEl.classList.add(SCORE_COLOR_CLASSES.fair);
    else labelEl.classList.add(SCORE_COLOR_CLASSES.poor);
}