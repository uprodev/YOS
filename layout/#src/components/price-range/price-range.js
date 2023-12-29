function priceRangeHandler(priceRangeContainer) {
    if (!priceRangeContainer) return;

    const min = priceRangeContainer.dataset.min;
    const max = priceRangeContainer.dataset.max;
    const start = priceRangeContainer.dataset.start;
    const end = priceRangeContainer.dataset.end;
    const step = priceRangeContainer.dataset.step;
    const slider = priceRangeContainer.querySelector('.price-range__slider');
    const inputStart = priceRangeContainer.querySelector('.price-range__input--start');
    const inputEnd = priceRangeContainer.querySelector('.price-range__input--end');

    const priseRange = noUiSlider.create(slider, {
        start: [+start, +end],
        connect: true,
        range: {
            'min': [+min],
            'max': [+max],
        },
        step: +step,
        tooltips: false,
        format: wNumb({
            decimals: 0,
        })
    });

    priseRange.on('update', function (values, handle) {
        let value = values[handle];

        if (handle) {
            inputEnd.value = value;
        } else {
            inputStart.value = value;
        }
    });

    priseRange.on('change', (values, handle) => {
        if (handle) {
            let event = new Event("change", { bubbles: true });
            inputEnd.dispatchEvent(event);
        } else {
            let event = new Event("change", { bubbles: true });
            inputStart.dispatchEvent(event);
        }
    })

    inputStart.addEventListener('change', function () {
        priseRange.set([this.value, null]);
    });
    inputEnd.addEventListener('change', function () {
        priseRange.set([null, this.value]);
    });

    return {
        reset: () => {
            priseRange.set([+start, +end]);
            let event = new Event("change", { bubbles: true });
            inputEnd.dispatchEvent(event);
            inputStart.dispatchEvent(event);
        }
    }
}