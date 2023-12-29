// Fields labels animation
const inputsWrap = document.querySelectorAll('[data-input]');
if (inputsWrap.length) {
    inputsWrap.forEach(inputWrap => {
        const input = inputWrap.querySelector('input');
        input.addEventListener('focus', () => {
            inputWrap.classList.add('using');
        });

        input.addEventListener('blur', (e) => {
            if (input.value.length === 0) inputWrap.classList.remove('using');
        });
    })
}