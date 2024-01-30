const sideBasket = document.querySelector('[data-side-basket]');
if (sideBasket) {

    document.addEventListener('click', (e) => {
        if(e.target.closest('[data-action="open-side-basket"]')) {
            e.preventDefault();
            bodyLock();
            sideBasket.classList.add('open');
            document.body.classList.add('overflow-hidden');
        } else if(e.target.closest('[data-action="close-side-basket"]')) {
            e.preventDefault();
            sideBasket.classList.remove('open');
            bodyUnlock();
        }
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