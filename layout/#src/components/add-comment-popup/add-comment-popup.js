{
    const addCommentForm = document.querySelector('#add-comment-popup #commentform');
    if(addCommentForm) {
        const buttonSubmit = addCommentForm.querySelector('button[type="submit"]');

        const inputAuthor = addCommentForm.querySelector('input[name="author"]');
        const inputEmail = addCommentForm.querySelector('input[name="email"]');
        const inputRating = addCommentForm.querySelector('input[name="rating"]');
        const textareaComment = addCommentForm.querySelector('textarea[name="comment"]');

        
        buttonSubmit && buttonSubmit.addEventListener('click', (e) => {
            if(buttonSubmit.closest('.product-comments__list')) return;

            const validateState = {}

            if(inputRating) {
                validateState.rating = inputRating.value !== "0";
                if(!validateState.rating) {
                    inputRating.closest('.set-stars')?.classList.add('error');
                }
            }

            if(inputAuthor) {
                validateState.author = !!inputAuthor.value.trim().length;
                if(!validateState.author) {
                    inputAuthor.parentElement.classList.add('error');
                }
            }

            if(inputEmail) {
                validateState.email = !!inputEmail.value.trim().length;
                if(!validateState.email) {
                    inputEmail.parentElement.classList.add('error');
                }
            }

            if(textareaComment) {
                validateState.comment = !!textareaComment.value.trim().length;
                if(!validateState.comment) {
                    textareaComment.parentElement.classList.add('error');
                }
            }

            if(
                (validateState.hasOwnProperty('rating') ? !validateState.rating : false)
                || (validateState.hasOwnProperty('author') ? !validateState.author : false)
                || (validateState.hasOwnProperty('email') ? !validateState.email : false)
                || (validateState.hasOwnProperty('comment') ? !validateState.comment : false)
            ) {
                e.preventDefault();
                return;
            };
        })

        inputRating && inputRating.closest('.set-stars')?.addEventListener('click', () => {
            inputRating.closest('.set-stars')?.classList.remove('error');
        })

        inputAuthor && inputAuthor.addEventListener('focus', () => {
            inputAuthor.parentElement.classList.remove('error');
        })

        inputEmail && inputEmail.addEventListener('focus', () => {
            inputEmail.parentElement.classList.remove('error');
        })

        textareaComment && textareaComment.addEventListener('focus', () => {
            textareaComment.parentElement.classList.remove('error');
        })
    }
}