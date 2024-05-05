
const button = document.querySelector("#createUser");

const passw1 = document.querySelector("#crpass1");
const passw2 = document.querySelector("#crpass2");

button.addEventListener('click', function(event) {
    if (passw1.value != passw2.value) {
        alert("Les 2 mot de passe doivent êtres les mêmes !");
        event.preventDefault();    
    }
});
