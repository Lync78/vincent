const dropdown = {

    dropdown: () => {
        const element = document.querySelectorAll(".dropdown");
        for (let i = 0; i < element.length;i++){

            element[i].addEventListener("click", () => {
                const racine = element[i].parentElement;

                const ul = racine.children[1];

                if (ul.classList.contains("d-none")){
                    ul.classList.remove("d-none");
                }
                else {
                    ul.classList.add("d-none");
                }

                if (element[i].children[1].classList.contains("rotate-90")){
                    element[i].children[1].classList.remove("rotate-90");
                    element[i].children[1].classList.add("rotate-0");
                }
                else if (element[i].children[1].classList.contains("rotate-0")){
                    element[i].children[1].classList.remove("rotate-0");
                    element[i].children[1].classList.add("rotate-90");
                }
            })
        }
    },

    avatar: () => {
        const imgAvatar = document.querySelector(".avatar img");

        const ul = document.querySelector(".avatar ~ ul");

        imgAvatar.addEventListener("click", () => {
            if (ul.classList.contains("d-none")){
                ul.classList.remove("d-none");
            }
            else {
                ul.classList.add("d-none");
            }
        })
    },

    init: () => {
        dropdown.dropdown();
        dropdown.avatar();
    },
}

document.addEventListener("DOMContentLoaded", dropdown.init);