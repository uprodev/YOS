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

