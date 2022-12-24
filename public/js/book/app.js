const app = {

    valeur: 0,

    setValue: (valeur) => {
        app.valeur = valeur;
    },

    getValue: () => {
      return app.valeur;
    },


    afficher: () => {
        const display = document.querySelector('.category');

        const book = document.querySelector(".book-present-select");

        display.addEventListener('click', () => {
            if (book.classList.contains("d-none")){
                book.classList.remove("d-none");
            }
            else {
                book.classList.add("d-none");
            }
        });

    },

    ecouteur: () => {
        const ecouteur = document.querySelectorAll('.navigation li p');

        for (let i = 0; i < ecouteur.length; i++){
            ecouteur[i].addEventListener('click', () => {
                app.setValue(ecouteur[i].dataset.value);
                app.form();

                const formulaire = document.querySelector('form');
                formulaire.closest('#hidden').submit();

            });
        }
    },

    form: () => {
        const input = document.querySelector('input[type=hidden]');
        input.setAttribute('value',app.getValue());
    },

    init: () => {
        app.afficher();
        app.ecouteur();
    },
}

document.addEventListener("DOMContentLoaded", app.init);