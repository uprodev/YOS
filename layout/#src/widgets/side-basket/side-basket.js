const sideBasket = document.querySelector('[data-side-basket]');
if (sideBasket) {
    const openButtons = document.querySelectorAll('[data-action="open-side-basket"]');
    const closeButtons = document.querySelectorAll('[data-action="close-side-basket"]');

    closeButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            sideBasket.classList.remove('open');
            bodyUnlock();
        })
    });

    openButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            bodyLock();
            sideBasket.classList.add('open');
            document.body.classList.add('overflow-hidden');
        })
    })

    sideBasket.addEventListener('click', (e) => {
        if (e.target.closest('.side-basket__container')) return;

        sideBasket.classList.remove('open');
        bodyUnlock();
    })

    window.sideBasket = {
        open: () => {
            bodyLock();
            sideBasket.classList.add('open');
            document.body.classList.add('overflow-hidden');
        },

        close: () => {
            sideBasket.classList.remove('open');
            bodyUnlock();
        }
    }
}