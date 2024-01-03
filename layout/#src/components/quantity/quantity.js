document.addEventListener('click', (e) => {
    if(e.target.closest('.quantity__btn')) {
        const btn = e.target.closest('.quantity__btn');
        const parent = btn.parentElement;
        const input = parent.querySelector('.quantity__value');

        if(btn.classList.contains('minus')) {
            if(input.value <= 1) return;
            
            input.value--;

            if(input.value == 1) {
                btn.classList.add('disabled');
            }
        } else if(btn.classList.contains('plus')) {
            input.value++;

            const btnMinus = parent.querySelector('.quantity__btn.minus');
            if(!btnMinus) return;
            btnMinus.classList.remove('disabled');
        }
    }
})

const quantityElements = document.querySelectorAll('[data-quantity]');
if(quantityElements.length) {
    quantityElements.forEach(quantityElement => {
        const btnMinus = quantityElement.querySelector('.quantity__btn.minus');
        const input = quantityElement.querySelector('.quantity__value');

        if(input.value == 1) {
            btnMinus.classList.add('disabled')
        }
    })
}