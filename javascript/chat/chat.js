
const urlparams = new URLSearchParams(window.location.search).get('messages');

const param = parseInt(urlparams).toString() == "NaN" ? 20 : parseInt(urlparams);

const loop = setInterval(async function () {

    await fetch(`../../php/chat/messages.php?count=${param}`)
        .then(response => response.text())
        .then(data => document.getElementById("wrapper").innerHTML = data)
        .catch(error => console.error(error));
    
}, 1000);
