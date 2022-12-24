const Packclient = {

    createElm: (file) => {
        const div = document.querySelector(".img-twitch-alerts");

        let video = document.createElement("video");
        video.setAttribute("autoplay","autoplay");
        video.setAttribute("loop","");
        video.setAttribute("preload","auto");
        video.setAttribute("muted","muted");


        let source = document.createElement("source");
        source.setAttribute("type","video/webm");
        source.setAttribute("src",file);

        video.append(source);

        div.append(video);

    },

    bouton: () => {
        const list = document.querySelectorAll(".bouttons-liste button");
        const videos = document.querySelectorAll(".img-twitch-alerts video");

        if (list != null){
            for (let i = 0; i < list.length; i++){
                list[i].addEventListener("click", () => {
                    if (!list[i].classList.contains("disabled-video")){
                        let actif = document.querySelector(".actif");
                        actif.classList.remove("actif");
                        list[i].classList.add('actif');
                        let videoActif = document.querySelector(".img-twitch-alerts video:not(.d-none)");
                        for(let j = 0; j < videos.length;j++){
                            if (j === i){
                                videoActif.classList.add("d-none");

                                videos[i].classList.remove("d-none");
                            }
                        }
                    }
                })
            }
        }

    },



    init: () => {
        Packclient.bouton();
    },
}

document.addEventListener("DOMContentLoaded", Packclient.init);