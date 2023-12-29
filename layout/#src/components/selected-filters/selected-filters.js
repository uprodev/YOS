function selectedFiltersHandler(containers) {
    if(!containers.length) return;
    const subscriptions = [];

    const removeItem = (id) => {
        if(!id) return;
        const items = Array.from(containers).map(container => {
            const [el] = Array.from(container.children).filter(item => {
                const itemId = item.getAttribute('data-selected-filter-id');
                if(itemId == id) return item;
            })
            if(el) return el;
        });

        if(!items.length) return;
        items.forEach(item => item?.remove());

        containers.forEach(container => {
            if(!container.children.length) {
                container.parentElement.classList.add('d-none');
            }
        })

        subscriptions.forEach(fun => fun(id));
    }

    document.addEventListener('click', (e) => {
        if(e.target.closest('[data-action="remove-selected-filter"]')) {
            e.preventDefault();
            const item = e.target.closest('.selected-filters__item');
            const itemId = item.getAttribute('data-selected-filter-id');
            removeItem(itemId)
        }
    })

    return {
        addItem: (id, text) => {
            containers.forEach(container => {
                container.parentElement.classList.remove('d-none');

                container.insertAdjacentHTML('beforeend', `
                <div class="selected-filters__item" data-selected-filter-id="${id}">
                    ${text}
                    <button type="button" data-action="remove-selected-filter">
                        <span class="icon-close"></span>
                    </button>
                </div>
                `)
            });
        },

        removeItem,

        onRemoveItem: (callback) => {
            subscriptions.push(callback);
        },

        removeAll: () => {
            const ids = Array.from(new Set(
                Array.from(containers).map(container => {
                    container.parentElement.classList.add('d-none');
    
                    return Array.from(container.children).map(item => {
                        return item.getAttribute('data-selected-filter-id');
                    })
                }).flat()
            ))

            ids.forEach(id => {
                removeItem(id);
            });
        }
    }
}