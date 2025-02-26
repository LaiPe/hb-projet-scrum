let form = document.querySelector("#form");

let username = document.querySelector("#username");
let username_create = document.querySelector("#username_create");
let password = document.querySelector("#password");

let password_value = "Lorem";

console.log(password_value);

form.addEventListener("submit", (e) => {
    e.preventDefault();

    username.innerHTML = "";
    username_create.innerHTML = "";
    
    if (form.username.value != "") {
        username_create.innerHTML = `${ form.username.value }`;
        password.innerHTML = `${ password_value }`;
    }
});