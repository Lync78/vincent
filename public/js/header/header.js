const header = {

    actif: true,

    service: true,

    flecheServie: document.querySelector(".fleche-service"),
    flechePresentation: document.querySelector(".fleche-presentation"),

    serviceDropdown: document.querySelector(".service-dropdown"),
    presentationDropdown: document.querySelector(".presentation-dropdown"),
    presentation: true,

    menuMobile: () => {
        const boutton = document.querySelector(".btn-mobile");

        const croix = document.querySelector(".croix");

        const burger = document.querySelector(".burger");

        const selection = document.querySelector(".selection-mobile");

        boutton.addEventListener("click", () => {

            if (header.actif){
                croix.classList.remove("d-none");
                burger.classList.add("d-none");

                header.serviceDropdown.classList.remove("d-none");
                header.presentationDropdown.classList.remove("d-none");


                selection.classList.remove("d-none");

                header.actif = false;
            }
            else {
                croix.classList.add("d-none");
                burger.classList.remove("d-none");

                header.serviceDropdown.classList.add("d-none");
                header.presentationDropdown.classList.add("d-none");

                selection.classList.add("d-none");

                header.actif = true;
            }


        });

    },

    serviceMobile: () => {

        header.flecheServie.addEventListener("click", () => {
            if (header.service){

                header.serviceDropdown.classList.remove("d-none");

                header.service = false;
            }
            else {

                header.serviceDropdown.classList.add("d-none");

                header.service = true;
            }


        });

    },

    presentationMobile: () => {
        const dropdown = document.querySelector(".presentation-dropdown");

        header.flechePresentation.addEventListener("click", () => {
            if(header.presentation){

                header.presentationDropdown.classList.remove("d-none");

                header.presentation = false;
            }
            else {

                header.presentationDropdown.classList.add("d-none");

                header.presentation = true;
            }
        });
    },

    init: () => {
        header.menuMobile();
        header.serviceMobile();
        header.presentationMobile();
    },
}

document.addEventListener("DOMContentLoaded", header.init);