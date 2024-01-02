//toggle button as disabled by id handler
document.addEventListener('change', (e) => {
    if(e.target.closest('input[type="checkbox"][data-action="toggle-button-as-disabled-by-id"]')) {
        const checkbox = e.target;

        const id = checkbox.getAttribute("data-id");
        if(!id) return;

        const el = document.querySelector(`[data-target="toggle-button-as-disabled-by-id"][data-id="${id}"]`);
        if(!el) return;
        
        if(checkbox.checked) {
            el.removeAttribute('disabled');
        } else {
            el.setAttribute('disabled', '');
        }
    }
});


const productSection = document.querySelector('[data-product]');
if(productSection) {
    const productActionsFooter = productSection.querySelector('.product-actions__footer');

    if(!productActionsFooter) return;

    const productSectionOpserver = new IntersectionObserver((entries) => {
        const entry = entries[0];
        if(!entry) return;

        if(entry.isIntersecting) {
            productActionsFooter.classList.remove('hide');
        } else {
            productActionsFooter.classList.add('hide');
        }
    }, {
        rootMargin: "-80% 0px 0px 0px",
    });
    productSectionOpserver.observe(productSection);
}
