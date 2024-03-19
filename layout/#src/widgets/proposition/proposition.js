{
    const proposition = document.querySelector('[data-proposition]');
    if (proposition) {
        this.utils.setHeightOfWindowWhenResize(proposition);

        document.addEventListener('click', (e) => {
            if (e.target.closest('[data-action="open-proposition"]')) {
                e.preventDefault();
                bodyLock();
                proposition.classList.add('open');
            } else if (e.target.closest('[data-action="close-proposition"]')) {
                e.preventDefault();
                proposition.classList.remove('open');
                bodyUnlock();
            }
        })

        proposition.addEventListener('click', (e) => {
            if (e.target.closest('.side-basket__container')) return;

            proposition.classList.remove('open');
            bodyUnlock();
        })

        window.proposition = {
            open: () => {
                bodyLock();
                proposition.classList.add('open');
            },

            close: () => {
                proposition.classList.remove('open');
                bodyUnlock();
            }
        }
    }
}