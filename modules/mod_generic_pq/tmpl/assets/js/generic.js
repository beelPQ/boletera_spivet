(() => {



    window.addEventListener("DOMContentLoaded", () => {
        console.log("js generic en linea")
        if( document.querySelector(`.spinner`) ){
            setTimeout(() => {
                document.querySelector(`.spinner`).style.display = "none";
            }, 1000); 
        }
    })

})();


