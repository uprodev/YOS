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


const commentsList = document.querySelector('.product-comments__list');
if(commentsList) {
    commentsList.addEventListener('click', (e) => {
        if(e.target.closest('[data-open-form]')) {
            const parent = e.target.closest('.comment');
            if(!parent) return;

            const formWrap = parent.querySelector('.comment__form');
            if(!formWrap) return;
            formWrap.classList.add('show');
        }

        if(e.target.closest('[data-close-form]')) {
            const parent = e.target.closest('.comment');
            if(!parent) return;

            const formWrap = parent.querySelector('.comment__form');
            if(!formWrap) return;
            formWrap.classList.remove('show');
        }
    })
}