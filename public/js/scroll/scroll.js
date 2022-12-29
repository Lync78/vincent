const haut = {

    scrolling: () => {
        const donnee = document.querySelector(".retour-haut");
        
        if (donnee !== null){
            donnee.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    left: 0,
                    behavior: "smooth",
                });

            });

        }
    },

    init: () => {
        haut.scrolling();
    },
}

document.addEventListener("DOMContentLoaded", haut.init);