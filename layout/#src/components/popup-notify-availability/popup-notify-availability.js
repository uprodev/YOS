{
    const availabilityForm = document.querySelector('#popup-notify-availability form.wpcf7-form');
    if(availabilityForm) {
        const btnSubmit = availabilityForm.querySelector('button[type="submit"]');
        if(!btnSubmit) return;
        btnSubmit.setAttribute('disabled', '');

        availabilityForm.addEventListener('input', (e) => {
            if(e.target.closest('.phone-input')) {
                const input = e.target;
                if(input.value.match(/\d/gi).length === 12) {
                    btnSubmit.removeAttribute('disabled');
                } else {
                    btnSubmit.setAttribute('disabled', '');
                }
            }
        })
    }
}