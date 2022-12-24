const scroll = {

    scrolling: () => {
        const donnee = document.querySelector(".retour-haut");
        
        if (donnee !== null){
            donnee.addEventListener('click', () => {
                window.scroll({
                    top: 0,
                    left: 0,
                    behavior: "smooth",
                });

            });

        }
    },

    init: () => {
        scroll.scrolling();
    },
}

document.addEventListener("DOMContentLoaded", scroll.init);