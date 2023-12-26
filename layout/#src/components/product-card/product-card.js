document.addEventListener('click', (e) => {
    if(e.target.closest('[data-product-card-option]')) {
        const radio = e.target;
        const productCard = radio.closest('[data-product-card]');
        if(!productCard) return;

        const priceItems = productCard.querySelectorAll('.product-card__price[data-index]');
        const index = radio.getAttribute('data-index');
        
        priceItems.forEach(item => {
            const itemIndex = item.getAttribute('data-index');
            if(itemIndex === index) {
                item.classList.add('show');
            } else {
                item.classList.remove('show');
            }
        });
    }
})