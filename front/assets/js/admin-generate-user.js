const form = document.querySelector("#form");

const username_input = document.querySelector("#username");

const username_text = document.querySelector("#username_create");
const password_text = document.querySelector("#password");
const error_text = document.querySelector("#error");

form.addEventListener("submit", (e) => {
    e.preventDefault();

    username_text.textContent = "";
    password_text.textContent = "";
    error_text.textContent = "";

    const formData = new FormData(form);

    fetch(form.action, {
        method: form.method,
        body: formData,
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Erreur réseau");
        }
        return response.json();
    })
    .then(data => {
        if (data.username && data.password) {
            username_text.textContent = data.username;
            password_text.textContent = data.password;
        } else {
            error_text.textContent = "Erreur lors de la génération, veuillez consulter le support."
            console.error("Réponse JSON invalide");
        }
    })
    .catch(error => {
        error_text.textContent = "Erreur lors de la génération, veuillez consulter le support."
        console.error("Erreur lors de la requête:", error);
    });
});