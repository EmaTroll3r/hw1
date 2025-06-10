
function validateCredentials(event) {
    
    let username = form.username.value;
    let password = form.password.value;
    let email = form.email.value;


    if (username.length == 0 || password.length == 0 || email.length == 0) {
        event.preventDefault();
        alert("Please fill in all fields.");
        return false;
    }

    if (password.length < 8) {
        event.preventDefault();
        alert("Password must be at least 8 characters long.");
        return false;
    }

    if (!/[A-Z]/.test(password) || 
        !/[a-z]/.test(password) || 
        !/[0-9]/.test(password) || 
        !/[\W_]/.test(password)) {
        
        event.preventDefault();
        alert("Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.");
        return false;
    }

    if (!email.includes('@')){

        event.preventDefault();
        alert("Please enter a valid email address.");
        return false;
    }


}

const form = document.querySelector('#form');

form.addEventListener('submit', validateCredentials);