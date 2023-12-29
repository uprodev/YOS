function filterBrandsHandler(filterBrandsEl) {
    if(!filterBrandsEl) return;

    const input = filterBrandsEl.querySelector('.filter-brands__search-input input');
    if (!input) return;

    const list = filterBrandsEl.querySelector('.filter-brands__list');
    if (!list) return;

    const listData = Array.from(list.children).map(listRow => {
        const rowItemsBlock = listRow.querySelector('.filter__block');
        const rowItemsData = rowItemsBlock?.children
            ? Array.from(rowItemsBlock.children).map(rowItem => {
                const text = rowItem.querySelector('.filter-checkbox-radio__text');
                return {
                    el: rowItem,
                    text: rowItem.querySelector('.filter-checkbox-radio__text').innerText.trim().toLowerCase()
                }
            })
            : null
        return {
            letter: listRow.getAttribute('data-letter').toLowerCase(),
            el: listRow,
            children: rowItemsData
        }
    })

    input.addEventListener('input', (e) => {
        const inputValue = e.target.value.trim().toLowerCase();
        const firstLetter = inputValue.at(0);

        listData.forEach(listRowData => {
            if (inputValue.length) {

                if (firstLetter !== listRowData.letter) {

                    listRowData.el.classList.add('d-none');

                } else {
                    listRowData.children.forEach(rowItem => {

                        if (!rowItem.text.startsWith(inputValue)) {
                            rowItem.el.classList.add('d-none');
                        } else {
                            rowItem.el.classList.remove('d-none');
                        }

                    })
                }

            } else {
                listRowData.el.classList.remove('d-none');
            }
        })
    });

    return {
        reset: () => {
            input.parentElement.classList.remove('using');

            listData.forEach(listRowData => {
                listRowData.el.classList.remove('d-none');
                listRowData.children.forEach(rowItem => {
                    rowItem.el.classList.remove('d-none');
                })
            })
        }
    }
}