// Mostrar iconos del contacto flotante
$(document).on('click', '.contacto_flotante__principal',  function(){
    
    const icons = document.querySelectorAll(`.contacto_flotante__item`);
    icons.forEach(element => {
        if(!element.classList.contains(`flotante__show`)){
            element.classList.add(`flotante__show`);
        }else{
            element.classList.remove(`flotante__show`);
        }
    });
    if( document.querySelector(`.flotante__show`) ){
        const btnPrincipal = document.querySelector(`#imgButtonWidget`);
        if(!btnPrincipal.classList.contains("btn-active")){
            btnPrincipal.classList.add("btn-active");
        }
    }else{
        const btnPrincipal = document.querySelector(`#imgButtonWidget`);
        if(btnPrincipal.classList.contains("btn-active")){
            btnPrincipal.classList.remove("btn-active");
        }
    }
});

$(document).on('click', '.contacto_flotante__compartir',  function(){
    const shared = document.querySelector(`#contentShareLink`);
    if(shared.classList.contains(`desactive-content`)){
        shared.classList.remove(`desactive-content`)
    }
});

$(document).on('click', '.button-closed-shared',  function(){
    const shared = document.querySelector(`#contentShareLink`); 
    if(!shared.classList.contains(`desactive-content`)){
        shared.classList.add(`desactive-content`)
    }else{
        shared.classList.remove(`desactive-content`)
    }
});

$(document).on('click', '#btnCopyHash',  function(){
    let copyText = document.getElementById("txtInputHash"); 
        copyText.select();
        copyText.setSelectionRange(0, 99999); 
        
        document.execCommand("copy");
});


