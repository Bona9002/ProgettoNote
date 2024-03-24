window.addEventListener("load",()=>{
    const urlParams = new URLSearchParams(window.location.search);
    const errore = urlParams.get('error')
    console.log(errore);
    if(errore){
        document.getElementById('error').textContent="Utente o Password non corretti";
    }
});


function showRegisterForm() {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('registerForm').style.display = 'block';
}

function showLoginForm() {
    document.getElementById('loginForm').style.display = 'block';
    document.getElementById('registerForm').style.display = 'none';
}

function showPasswordRegister() {
    let password = document.getElementById('register-password');
    let icons = document.getElementsByClassName('occhio');
    if (password.type === "password") {
        password.type = "text";
        for (let icon of icons) {
            icon.classList.replace("fa-eye-slash","fa-eye")
        }
        
        //icon.classList.add("fa-eye-slash");
        //icon.classList.remove("fa-eye");
    }
    else {
        password.type = "password";
        for (let icon of icons) {
            icon.classList.replace("fa-eye","fa-eye-slash")
        }
        //icon.classList.add("fa-eye");
        //icon.classList.remove("fa-eye-slash");
    }
}

function showPasswordLogin() {
    let password = document.getElementById('login-password');
    let icons = document.getElementsByClassName('occhio');
    if (password.type === "password") {
        password.type = "text";
        for (let icon of icons) {
            icon.classList.replace("fa-eye-slash","fa-eye")
        }
    }
    else {
        password.type = "password";
        for (let icon of icons) {
            icon.classList.replace("fa-eye","fa-eye-slash")
        }
    }
}