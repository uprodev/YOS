document.addEventListener('click', (e) => {
    if(e.target.closest('input[type="radio"][data-label]')) return;

    if (e.target.closest('.product-actions__option:not(.colors)')) {
        if(!e.target.closest('[data-product-card]')) return;
        const productOptionsParent = e.target.closest('.product-actions__option:not(.colors)');
        hideCheckedItems(productOptionsParent);
        productOptionsParent.classList.toggle('active');
    } else {
        document.querySelectorAll('.product-actions__option.active').forEach(el => el.classList.remove('active'))
    }
});

document.addEventListener('change', (e) => {
    if(e.target.closest('input[type="radio"][data-label]')) {
        const radio = e.target.closest('input[type="radio"][data-label]');
        if(!radio.closest('[data-product-card]')) return;

        const productOptionsParent = radio.closest('.product-actions__option:not(.colors)');
        if(!productOptionsParent) return;
        
        const head = productOptionsParent.querySelector('.product-actions__option-head');
        if(!head) return;

        const radioValue = radio.getAttribute('data-label');
        if(!radioValue) return;
        head.innerText = radioValue;
        head.setAttribute('data-label', radioValue);
    }
})

function hideCheckedItems(optionWrapperEl) {
    if(!optionWrapperEl) return;

    const head = optionWrapperEl.querySelector('.product-actions__option-head');
    if(!head) return;

    optionWrapperEl.querySelectorAll('input[type="radio"]')
        .forEach(radio => {
            const parent = radio.closest('.product-actions__option-item');
            
            if(radio.checked) {
                parent?.classList.add('d-none');
            } else {
                parent?.classList.remove('d-none');
            }
        })
}

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

function chunkArray(array, size = 3) {
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
            const chunkedProducts = chunkArray(productsCards, chunksSize);

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