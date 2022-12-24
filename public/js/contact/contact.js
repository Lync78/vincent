const contact = {

    actif: false,


    flecheRaison: () => {
        const fleche = document.querySelector(".selected-raison");
        const selection = document.querySelector("div.select-choix");

        fleche.addEventListener('click', () => {

            if (!fleche.classList.contains("disable")){
                fleche.classList.add("disable");
                selection.classList.add("d-none");
            }

            else {
                fleche.classList.remove("disable");
                selection.classList.remove("d-none");

            }
        });
    },

    select: () => {
        const choix = document.querySelectorAll('.select-choix ul li p');
        const hidden = document.querySelector("input[type=hidden].input");
        const changement = document.querySelector(".selected-raison h4");
        const selection = document.querySelector("div.select-choix");
        const fermeture = document.querySelector(".selected-raison");
        for(let i = 0; i < choix.length; i++){
            choix[i].addEventListener('click', () => {
                hidden.setAttribute('value',choix[i].dataset.value);

                changement.textContent = choix[i].textContent;

                selection.classList.add("d-none");
                fermeture.classList.add("disable");
                contact.actif = false;

            });
        }
    },


    init:  () => {
        contact.flecheRaison();
        contact.select();
    },
}

document.addEventListener("DOMContentLoaded", contact.init);