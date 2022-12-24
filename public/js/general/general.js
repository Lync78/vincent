const general = {

    images: () => {
        const imgs = document.querySelectorAll("img");

        for (let i = 0; i < imgs.length;i++){
            imgs[i].setAttribute("loading","lazy");
        }
    },

    init: () => {
        general.images();
    },
}

document.addEventListener("DOMContentLoaded", general.init);