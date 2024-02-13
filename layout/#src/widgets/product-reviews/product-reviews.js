const setStartsElements = document.querySelectorAll('[data-set-stars]');
if (setStartsElements.length) {
    setStartsElements.forEach((setStartsElement) => {
        const input = setStartsElement.querySelector('input');
        if (!input) return;

        const items = setStartsElement.querySelectorAll('.set-stars__item');

        items.forEach((item, index) => {

            item.addEventListener('click', () => {
                input.value = index + 1;
                items.forEach((i, ind) => {
                    if (ind > index) {
                        i.classList.remove('active');
                    } else {
                        i.classList.add('active');
                    }
                })
            });

            item.addEventListener('mouseenter', () => {
                items.forEach((i, ind) => {
                    if (ind > index) {
                        i.classList.remove('hover');
                    } else {
                        i.classList.add('hover');
                    }
                })
            })
        })

        setStartsElement.addEventListener('mouseleave', () => {
            items.forEach((i, ind) => {
                i.classList.remove('hover');
            })
        })
    })
}

const addCommentEl = document.querySelector('[data-add-comment]');
if (addCommentEl) {
    this.utils.setHeightOfWindowWhenResize(addCommentEl);

    const openButtons = document.querySelectorAll('[data-action="opne-add-comment"]');
    const closeButtons = document.querySelectorAll('[data-action="close-add-comment"]');

    closeButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            addCommentEl.classList.remove('open');
            document.documentElement.classList.remove('overflow-hidden');
        })
    });

    openButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            addCommentEl.classList.add('open');
            document.documentElement.classList.add('overflow-hidden');
        })
    })
}