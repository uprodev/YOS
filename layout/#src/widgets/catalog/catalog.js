const catalogFilter = document.querySelector('[data-filter]');
if (catalogFilter) {
    const openButtons = document.querySelectorAll('[data-action="open-filter"]');

    openButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            catalogFilter.classList.add('open');
            document.body.classList.add('overflow-hidden');
        })
    })

    catalogFilter.addEventListener('input', (e) => {
        if (e.target.closest('.filter__block-search')) {
            const inputSearch = e.target.closest('input');
            const parent = e.target.closest('.bapf_body');
            if (!parent) return;

            const list = parent.querySelector('ul');
            if (!list) return;

            const value = inputSearch.value.trim().toLowerCase();
            const firstLetter = value.at(0);

            Array.from(list.children).forEach(li => {
                const attr = li.getAttribute('data-letter')?.toLowerCase();
                if (value.length) {
                    if (attr) {
                        if (firstLetter !== attr) {
                            li.classList.add('d-none');
                            const prevLi = li.previousElementSibling;
                            if (!prevLi) return;
                            prevLi.getAttribute('data-letter') || prevLi.classList.add('d-none');
                        } else {
                            const text = li.querySelector('label')?.innerText.trim().toLowerCase();
                            if (!text) return;

                            if (!text.startsWith(value)) {
                                li.classList.add('d-none');
                            } else {
                                li.classList.remove('d-none');
                            }
                        }
                    } else {
                        const text = li.querySelector('label')?.innerText.trim().toLowerCase();
                        if (!text) return;

                        if (!text.startsWith(value)) {
                            li.classList.add('d-none');
                        } else {
                            li.classList.remove('d-none');
                        }
                    }
                } else {
                    li.classList.remove('d-none');
                }
            })
        }
    })

    catalogFilter.addEventListener('click', (e) => {
        if (e.target.closest('[data-action="close-filter"]') || e.target.closest('.filter__btn-close-mob')) {
            e.preventDefault();
            catalogFilter.classList.remove('open');
            document.body.classList.remove('overflow-hidden');
        }
    })

    catalogFilter.addEventListener('change', (e) => {
        if (e.target.closest('input[name="orderby"]')) {
            const orderByRadio = e.target;

            const sortBySelect = catalogFilter.querySelector('.filter__sort-by select');
            if (!sortBySelect) return;

            sortBySelect.value = orderByRadio.value;
            const event = new Event('change', { bubbles: true });
            sortBySelect.dispatchEvent(event);
        }
    })

    let observer = new MutationObserver(mutationRecords => {
        setOrderByRadioAsChecked();
        const selectedFilters = catalogFilter.querySelector('.berocket_aapf_widget_selected_filter');
        if (!selectedFilters) return;
        const items = selectedFilters.querySelectorAll('a');
        const selectedFilterItems = document.createElement('div');
        selectedFilterItems.className = "selected-filter-items";
        selectedFilterItems.append(...items);
        selectedFilters.replaceWith(selectedFilterItems);
    });


    observer.observe(catalogFilter, {
        childList: true,
        subtree: true, 
    });

    function setOrderByRadioAsChecked() {
        const sortBySelect = catalogFilter.querySelector('.filter__sort-by select');
        if (!sortBySelect) return;
        const sortByRadios = catalogFilter.querySelectorAll('.filter__sort-by input[name="orderby"]');
        sortByRadios.forEach(radio => {
            if (radio.value === sortBySelect.value) {
                radio.checked = true;
            }
        })
    }
}


const sortByDesktop = document.querySelector('.catalog__products-sort-by .sort-by .woocommerce-ordering');
if (sortByDesktop) {
    const select = sortByDesktop.querySelector('select.orderby');
    if(select) {
        selects_init([select]);
    }

    let observer = new MutationObserver((mutationRecords, obs) => {
        obs.disconnect();
        const select = sortByDesktop.querySelector('select.orderby');
        if(select) {
            selects_init([select]);
        }
        obs.observe(sortByDesktop, {
            childList: true, 
            //subtree: true,
        });
    });

    observer.observe(sortByDesktop, {
        childList: true, 
        //subtree: true,
    });
}

const productsList = document.querySelector('.catalog__products-list');
if(productsList) {
    const AlignPrices = initAlignPricesInOneLine();
    AlignPrices.apply(Array.from(productsList.querySelectorAll('.product-card')));
    
    let observer = new MutationObserver((mutationRecords, obs) => {
        AlignPrices.apply(Array.from(productsList.querySelectorAll('.product-card')));
    });

    observer.observe(productsList, {
        childList: true, 
        //subtree: true,
    });
}