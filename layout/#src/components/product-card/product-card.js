document.addEventListener('click', (e) => {
    if (e.target.closest('[data-product-card-option]')) {
        const radio = e.target;
        const productCard = radio.closest('[data-product-card]');
        if (!productCard) return;

        const priceItems = productCard.querySelectorAll('.product-card__price[data-index]');
        const index = radio.getAttribute('data-index');

        priceItems.forEach(item => {
            const itemIndex = item.getAttribute('data-index');
            if (itemIndex === index) {
                item.classList.add('show');
            } else {
                item.classList.remove('show');
            }
        });
    }
})

function debounce(func, delay) {
    let timeoutId;

    return function () {
        const context = this;
        const args = arguments;

        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            func.apply(context, args);
        }, delay);
    };
}

function alignPricesInOneLine(productsCards) {
    if (!productsCards?.length) return;

    const dataOfCardsTextElements = productsCards.map(product => {
        const text = product.querySelector('.product-card__text');
        if (!text) return null;
        text.style.minHeight = 'auto';
        return {
            el: text,
            height: text.clientHeight
        }
    })

    if (document.documentElement.clientWidth < 992) {
        dataOfCardsTextElements.forEach(data => data.el.removeAttribute('style', 'min-height'));
        return;
    }
    const height = Math.max(...dataOfCardsTextElements.map(data => {
        return data ? data.height : 0;
    }));

    dataOfCardsTextElements.forEach(data => {
        data.el.style.minHeight = height + 'px';
    })
}

function chunkArray(array, size) {
    const chunkedArray = [];

    for (let i = 0; i < array.length; i += size) {
        chunkedArray.push(array.slice(i, i + size));
    }

    return chunkedArray;
}


function initAlignPricesInOneLine() {
    const previousCalls = new Set();

    return {
        apply(productsCards, chunksSize, callback) {
            const chunkedProducts = chunkArray(productsCards, chunksSize = 3);

            const applyAlignment = () => {
                chunkedProducts.forEach(chunkProducts => {
                    alignPricesInOneLine(chunkProducts);
                });
                callback && callback();
            }

            applyAlignment();

            const debouncedApplyAlignmentFunc = debounce(applyAlignment, (50));

            window.addEventListener('resize', debouncedApplyAlignmentFunc);

            previousCalls.forEach(removeEventListener => removeEventListener());
            previousCalls.clear();

            previousCalls.add(() => window.removeEventListener('resize', debouncedApplyAlignmentFunc));
        }
    }

}