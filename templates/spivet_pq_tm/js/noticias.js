$(document).on('click', '.noticia__compartir',  function(){
    const shared = document.querySelector(`#contentShareLink`);
    if(shared.classList.contains(`desactive-content`)){
        shared.classList.remove(`desactive-content`)
    }
});