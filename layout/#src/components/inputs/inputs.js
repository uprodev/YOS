// Fields labels animation
const inputsWrap = document.querySelectorAll('[data-input]');
if (inputsWrap.length) {
    inputsWrap.forEach(inputWrap => {
        const input = inputWrap.querySelector('input');

        if(input.required) {
            inputWrap.classList.add('required')
        }

        input.addEventListener('focus', () => {
            inputWrap.classList.add('using');
        });

        input.addEventListener('blur', (e) => {
            if (input.value.length === 0) inputWrap.classList.remove('using');
        });
    })
}

const textareasWrap = document.querySelectorAll('[data-textarea]');
if (textareasWrap.length) {
    textareasWrap.forEach(textareaWrap => {
        const textarea = textareaWrap.querySelector('textarea');

        textarea.addEventListener('focus', () => {
            textareaWrap.classList.add('using');
        });

        textarea.addEventListener('blur', (e) => {
            if (textarea.value.length === 0) textareaWrap.classList.remove('using');
        });
    })
}