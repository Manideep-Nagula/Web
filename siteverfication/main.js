function setFormMessage(formElement, type, message) {
    const messageElement = formElement.querySelector(".form__message");

    messageElement.textContent = message;
    messageElement.classList.remove("form__message--success", "form__message--error");
    messageElement.classList.add(`form__message--${type}`);
}

function setInputError(inputElement, message) {
    inputElement.classList.add("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = message;
}

function clearInputError(inputElement) {
    inputElement.classList.remove("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = "";
}
function handleSignupResponse(responseObject){
    if(responseObject.ok){
        document.getElementById("login_message").innerHTML = responseObject.message;
        location.href='index.php';
    }
    else
    {
        document.getElementById("signup_message").innerHTML = responseObject.message;
    }
}
function handleLoginResponse(responseObject){
    if(responseObject.ok){
        location.href='Home/home.php';
    }
    else
    {
        document.getElementById('login_message').innerHTML  = responseObject.message;
    }
}
document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login");
    const createAccountForm = document.querySelector("#createAccount");

    document.querySelector("#linkCreateAccount").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.add("form--hidden");
        createAccountForm.classList.remove("form--hidden");
    });

    document.querySelector("#linkLogin").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.remove("form--hidden");
        createAccountForm.classList.add("form--hidden");
    });

    loginForm.addEventListener("submit", e => {
        e.preventDefault();
        const request = new XMLHttpRequest();
        request.open("post","login.php");
        request.send(new FormData(loginForm));
        
        request.onload = () => {
            let responseObject = null;
            try{
                responseObject =  JSON.parse(request.responseText);
            } catch(e){
                console.error('Could not parse JSON')
            }
            if(responseObject){
                handleLoginResponse(responseObject);
            }
        }
    });

    createAccountForm.addEventListener("submit", e => {
        e.preventDefault();

        const request = new XMLHttpRequest();
        request.open("post","createaccount.php");
        request.send(new FormData(createAccountForm));
        request.onload = () => {
            let responseObject = null;
            try{
                responseObject =  JSON.parse(request.responseText);
            } catch(e){
                console.error('Could not parse JSON')
            }
            if(responseObject){
                handleSignupResponse(responseObject);
            }
        }
    });

    document.querySelectorAll(".form__input").forEach(inputElement => {
        inputElement.addEventListener("blur", e => {
            if (e.target.id === "signupUsername" && e.target.value.length > 0 && e.target.value.length < 10) {
                setInputError(inputElement, "Username must be at least 10 characters in length");
            }
        });

        inputElement.addEventListener("input", e => {
            clearInputError(inputElement);
        });
    });
});