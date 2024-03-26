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
        if(e.target.closest('.comment__answers-count')) {
            const button = e.target.closest('.comment__answers-count');
            const comment = e.target.closest('.comment');
            if(!comment) return;

            if(button.classList.contains('active')) {
                button.classList.remove('active');
                Array.from(comment.parentElement.children).forEach(child => {
                    if(child === comment) return;
                    this.utils.slideUp(child, 300);
                })
                
            } else {
                button.classList.add('active');
                Array.from(comment.parentElement.children).forEach(child => {
                    if(child === comment) return;
                    this.utils.slideDown(child, 300);
                })
            }
        }
    })
}