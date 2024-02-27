(() => {

    setTimeout(() => {
        let header = document.querySelector(`#headerContent`);
        if( document.querySelector(`#tapeAnouncements`) ){
            if( header.classList.contains("anouncement-available") ){
                header.classList.remove("anouncement-available")
            }
        }else {
            if( header.classList.contains("anouncement-available") ){ 
            }else{
                header.classList.add("anouncement-available")
            }
        }
    }, 500);

})();