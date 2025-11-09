input = document.getElementById('user-password');
newdiv = document.createElement('div')
newdiv.className = 'text-danger'
input.parentElement.appendChild(newdiv)

input.addEventListener("input", (elem) => {
    input.classList.remove('border-danger', 'border-warning', 'border-success');
    if (/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!$#%])[a-zA-Z0-9!@#$%^&*]/.test(input.value)) {
        newdiv.textContent = '';
    }
    else if (/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9!@#$%^&*]/.test(input.value)) {
        newdiv.classList.remove('d-none');
        newdiv.textContent = 'пароль хороший, чтобы улучшить пароль, добавьте символы(!$#%)';
    }
    else if (/(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]/.test(input.value) && input.value.length > 6) {
        newdiv.classList.remove('d-none');
        newdiv.textContent = 'пароль средний, чтобы улучшить пароль, добавьте цифры и символы(!$#%)';
        input.classList.add("border-warning")

    } else if (input.value.length > 4 && input.value.length < 6) {
        newdiv.classList.remove('d-none');
        newdiv.textContent = 'пароль слабый, хороший пароль состоит не менее чем из 6 символов, содержит в себе буквы двух регистров, цифры и символы(!$#%)'
        input.classList.add("border-danger")
    } else {
        newdiv.classList.add('d-none');
        input.classList.add('border-danger');
    }
})