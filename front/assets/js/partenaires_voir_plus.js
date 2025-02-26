let text_hidden = document.querySelectorAll(".text_hidden");
let button_mutuelle = document.querySelectorAll(".button_mutuelle");

button_mutuelle.forEach((button, index) => {
    button.addEventListener("click", (e) => {
        e.preventDefault();
        text_hidden[index].classList.toggle("hidden");
        if(button_mutuelle[index].innerHTML === "En savoir plus") {
            button_mutuelle[index].innerHTML = "Masquer";
        } else {
            button_mutuelle[index].innerHTML = "En savoir plus";
        };
    });
});
