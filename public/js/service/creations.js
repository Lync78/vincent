const creations = {

    test: () => {
        const apercu = document.querySelectorAll(".block-apercu p");

        for (let i = 0; i < apercu.length;i++){
            console.log(apercu);
            apercu[i].addEventListener("click", () => {
                let racine = apercu[i].parentElement;
                racine.children[1].children[0].click();
            });
        }
    },

    init: () => {
        creations.test();
    },
}


document.addEventListener("DOMContentLoaded", creations.init);


Fancybox.bind('[data-fancybox="gallery-1"]', {

});






