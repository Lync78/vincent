const Service = {

    souris: () => {
        const boite = document.querySelectorAll(".block-info");

        for (let i = 0;i < boite.length;i++){
            if (!boite[i].classList.contains("d-none")){

                let suppression = boite[i].children[0].children[4];
                let edit = boite[i].children[0].children[3];

                boite[i].addEventListener("mouseover", () => {
                    suppression.classList.remove("d-none");
                    edit.classList.remove("d-none");
                });

                boite[i].addEventListener("mouseleave", () => {
                    suppression.classList.add("d-none");
                    edit.classList.add("d-none");
                });
            }
        }
    },

    click: () => {
        const formulaires = document.querySelectorAll(".formulaire-admin-serviceAccueil");

        for (let i = 0;i < formulaires.length;i++){
            formulaires[i].addEventListener("click", () => {
                let div  = formulaires[i].parentElement.parentElement;

                formulaires[i].parentElement.classList.add("d-none");

                div.children[1].classList.remove("d-none");

            });
        }


        const cancels = document.querySelectorAll(".cancel");

        for (let i = 0;i < cancels.length;i++) {

            cancels[i].addEventListener("click", () => {
                let form = cancels[i].parentElement;
                let div = cancels[i].parentElement.parentElement;

                div.children[0].classList.remove("d-none");
                form.classList.add("d-none");
            });
        }

        const suppresionForm = document.querySelectorAll(".form-delete button[type='button']");

        for (let i = 0;i < suppresionForm.length;i++){
            suppresionForm[i].addEventListener("click", () => {
                let form = suppresionForm[i].parentElement;

                let div = suppresionForm[i].parentElement.parentElement;

                form.classList.add("d-none");
                div.children[0].classList.remove("d-none");
            });

        }

        const suppresion = document.querySelectorAll(".trash");

        for (let i = 0;i < suppresion.length;i++){
            suppresion[i].addEventListener("click", () => {
               let form = suppresion[i].parentElement.parentElement;

               form.children[2].classList.remove("d-none");

               suppresion[i].parentElement.classList.add("d-none");
            });
        }



    },

    init: () => {
        Service.click();
        Service.souris();
    },
}

document.addEventListener("DOMContentLoaded", Service.init);