const passwordIcon =  document.querySelector('.fa-eye')
const passwordInput = document.querySelector('#password')
console.log(passwordIcon, passwordInput);

passwordIcon.addEventListener('click', (e)=>{
    console.log('click');
    if(passwordIcon.classList.contains('fa-eye')){
        passwordIcon.classList.replace('fa-eye','fa-eye-slash');
        passwordInput.type = 'text'
    }
    else if(passwordIcon.classList.contains('fa-eye-slash')){
        passwordIcon.classList.replace('fa-eye-slash', 'fa-eye');
        passwordInput.type = 'password'
    }
})