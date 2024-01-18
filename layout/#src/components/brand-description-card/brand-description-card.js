document.addEventListener('click', (e) => {
    if(e.target.closest('[data-action="show-full-description-card-text"]')) {
        e.preventDefault();
        e.target.closest('[brand-description-card]')?.classList.add('show-full-text');
    }
    if(e.target.closest('[data-action="hide-full-description-card-text"]')) {
        e.preventDefault();
        e.target.closest('[brand-description-card]')?.classList.remove('show-full-text');
    }
})