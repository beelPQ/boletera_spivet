    let tagsSelecteds = [];
    
    const asyncData = async (url, method, formData) => {
        let options = [];
        if (method == "GET") {
            options = { method: "GET" };
        } else {
            options = { method: "POST", body: formData };
        }
        const response = await fetch(url, options)
        return await response.json();
    }



    const getNotices = (typeDate, author, tags) => {
        let frmData = new FormData();
        frmData.append("method", "getNoticesFilter");
        frmData.append("typeDate", typeDate);
        frmData.append("author", author);
        frmData.append("tags", tags);
        const contentNotices = document.querySelector(`.noticias__lista`); 
        asyncData(`./modules/mod_k2_content/tmpl/noticias/Model/noticias.php`, `POST`, frmData)
        .then((result) => {
	        if(result.status){
	            
	            let itemsNotices = ``;
	            result.data.forEach((element, index) => {
                    itemsNotices += `
                    <a href="/noticias/${element.id}-${element.alias}" class="noticias__item">
        				<img src="/media/k2/items/cache/${element.image}">
        				<div class="noticias__informacion">
        					<div class="noticias__titulo">${element.title}</div>
        					<div class="noticias__autor">${element.created_by_alias}</div>
        					<div class="noticias__fecha">${element.date_formatter}</div>
        				</div>
        			</a>  
                    `
                });
                contentNotices.innerHTML = itemsNotices;
                setTimeout(() => {
                     contentNotices.classList.remove(`noticias__lista__hidden`);
                }, 500);
                
	            /* 
				<a href="/_joomla/./noticias/144-la-importancia-de-la-mujer-en-las-empresas-y--los-retos-a-los-que-se-enfrentan" class="noticias__item">
    				<img src="/_joomla/media/k2/items/cache/ebe9ac202a3149b75a8ae8adb2e1d8a7_XL.jpg?t=20240123_204601">
    				<div class="noticias__informacion">
    					<div class="noticias__titulo">La importancia de la mujer en las empresas y  los retos a los que se enfrentan</div>
    					<div class="noticias__autor">Por Dra. Margarita Heredia Soto</div>
    					<div class="noticias__fecha">16 de Mayo de 2023</div>
    				</div>
    			</a> 
	            */
	        }else{
	            contentNotices.innerHTML = `<div class="not__data__notices"><p>No hay noticias relacionadas a los filtros aplicados.<p></div>`; 
	            setTimeout(() => {
                     contentNotices.classList.remove(`noticias__lista__hidden`);
                }, 500);
	        }
        })
        .catch((error) => {
            console.error(error)
        });
    }


    
    document.addEventListener("change", (e) => {
        const idElement = e.target.id;
        if(idElement == "filterAuthor"){
            const author = document.querySelector(`#filterAuthor`).value;
            const typeDate = document.querySelector(`#filterTypeDate`).value;
            const tags = document.querySelector(`#filterTags`).value;
            const contentNotices = document.querySelector(`.noticias__lista`); 
            contentNotices.classList.add(`noticias__lista__hidden`);
            setTimeout(() => {
                getNotices(typeDate, author, tagsSelecteds);
            }, 200);
            
        }
        if(idElement == "filterTypeDate"){
            const author = document.querySelector(`#filterAuthor`).value;
            const typeDate = document.querySelector(`#filterTypeDate`).value;
            const tags = document.querySelector(`#filterTags`).value;
            const contentNotices = document.querySelector(`.noticias__lista`); 
            contentNotices.classList.add(`noticias__lista__hidden`);
            setTimeout(() => {
                getNotices(typeDate, author, tagsSelecteds);
            }, 200);
        }
        
    
    });


    document.addEventListener("click", (e) => {
        const idElement = e.target.id;
        if(idElement == "btnCleanFilters"){ 
            const author = document.querySelector(`#filterAuthor`).value = "";
            const typeDate = document.querySelector(`#filterTypeDate`).value = "";
            $('#filterTags').val(null).trigger('change');
            const contentNotices = document.querySelector(`.noticias__lista`); 
            contentNotices.classList.add(`noticias__lista__hidden`);
            setTimeout(() => {
                getNotices("reciente", "", "");
            }, 200);
        }
        if(idElement == "filterTags"){
            const author = document.querySelector(`#filterAuthor`).value;
            const typeDate = document.querySelector(`#filterTypeDate`).value;
            const contentNotices = document.querySelector(`.noticias__lista`); 
            contentNotices.classList.add(`noticias__lista__hidden`);
            setTimeout(() => {
                getNotices(typeDate, author);
            }, 200);
        }
    });
    
    document.addEventListener("DOMContentLoaded", () => {
       if(document.querySelector(`#filterTags`)){
           $('#filterTags').select2({
               multiple: true,
               placeholder: "Seleccionar etiqueta"
           });
       } 
       
       
        $('#filterTags').on('change', function () {
            let opcionesSeleccionadas = $('#filterTags').val();
            const author = document.querySelector(`#filterAuthor`).value;
            const typeDate = document.querySelector(`#filterTypeDate`).value;
            const contentNotices = document.querySelector(`.noticias__lista`); 
            contentNotices.classList.add(`noticias__lista__hidden`);
            tagsSelecteds = opcionesSeleccionadas;
            setTimeout(() => {
                getNotices(typeDate, author, opcionesSeleccionadas);
            }, 250);
       
        });
    });
    

