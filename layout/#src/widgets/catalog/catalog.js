const catalogFilter = document.querySelector('[data-filter]');
if(catalogFilter) {
    const filterBrands = filterBrandsHandler(document.querySelector('[data-filter-brands]'));
    const selectedFilters = selectedFiltersHandler(document.querySelectorAll('.selected-filters'));
    const form = catalogFilter.querySelector('.filter__form');
    const priceRage = priceRangeHandler(document.querySelector('[data-range]'));
    const openButtons = document.querySelectorAll('[data-action="open-filter"]');
    const closeButtons = document.querySelectorAll('[data-action="close-filter"]');
    const mobileOpenFilterButtonCount = document.querySelector('.catalog__mobile-open-filter-button span');
    const buttonReset = document.querySelector('.filter__reset');

    const setCountOfSelectedFilters = (value) => {
        mobileOpenFilterButtonCount.innerHTML = value;

        if(value) {
            buttonReset.removeAttribute('disabled', '');
        } else {
            buttonReset.setAttribute('disabled', '');
        }
    }

    form.addEventListener('reset', (e) => {
        e.preventDefault();
        filterBrands?.reset();
        selectedFilters?.removeAll();
        priceRage?.reset();
    })

    form.addEventListener('change', (e) => {
        const result = Array.from(form.elements).reduce((value, el) => {
            if(el.nodeName === 'INPUT' && el.type === 'checkbox' && el.checked) {
                return ++value
            } else {
                return value;
            }
        }, 0);
        setCountOfSelectedFilters(result);

        if(e.target.nodeName === 'INPUT' && e.target.type === 'checkbox') {
            const checkbox = e.target;
            
            if(checkbox.checked) {
                const id = Date.now();
                const text = checkbox.parentElement.querySelector('.filter-checkbox-radio__text')?.innerText.trim() || null;
                if(!text) return;

                checkbox.setAttribute('data-id', id);
                selectedFilters.addItem(id, text);
            } else {
                const id = checkbox.getAttribute('data-id');
                if(!id) return;

                selectedFilters.removeItem(id);
            }
        }
    });

    selectedFilters.onRemoveItem((id) => {
        const el = form.querySelector(`[data-id="${id}"]`);

        el.checked = false;
        el.removeAttribute('data-id');

        const event = new Event('change', { bubbles: true });
        el.dispatchEvent(event);
    });

    closeButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            catalogFilter.classList.remove('open');
            document.body.classList.remove('overflow-hidden');
        })
    });

    openButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            catalogFilter.classList.add('open');
            document.body.classList.add('overflow-hidden');
        })
    })
}
