window.addEventListener("load",()=>{
    const urlParams = new URLSearchParams(window.location.search);
    const errore = urlParams.get('error')
    if(errore){
        urlParams.delete('error')
        document.getElementById('error').textContent=errore;
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
            icon.innerHTML = "visibility"
        }
    }
    else {
        password.type = "password";
         for (let icon of icons) {
            icon.innerHTML = "visibility_off"
         }
    }
}

function showPasswordLogin() {
    let password = document.getElementById('login-password');
    let icons = document.getElementsByClassName('occhio');
    if (password.type === "password") {
        password.type = "text";
        for (let icon of icons) {
            icon.innerHTML = "visibility"
        }
    }
    else {
        password.type = "password";
        for (let icon of icons) {
            icon.innerHTML = "visibility_off"
         }
    }
}