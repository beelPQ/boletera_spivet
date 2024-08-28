(() => {
    'use strict';

    /**
    **Funcion encargada de ejecutar una peticion al servidor
    * @param {string} url direccion 
    * @param {string} method tipo de metodo post o get
    * @param {object} formData objeto FormData que contiene los parametros a enviar
    * @returns json que contiene la respuesta del serividor
   */
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


    /**
     * Funcion que obtiene todos los tipos de oferta
     */
    const getTypeOferts = () => {
        let formData = new FormData();
        formData.append("method", "getMenuTypeOferts");
        asyncData(`/modules/mod_inicio/tmpl/model/oferta.php`, `POST`, formData)
            .then((result) => {
                if (result.status) {
                    
                    const contentMenuTypes = document.querySelector(`.content-oferta-items-menu`);
                    contentMenuTypes.innerHTML = "";
                    const buttonAll = document.createElement("button");
                    buttonAll.classList.add("button-type-menu", "oferta-menu", "type-selected");
                    buttonAll.id = `btnMenuType-all`;
                    buttonAll.innerText = "Todos";
                    buttonAll.dataset.idtype = "todos";
                    buttonAll.type = "button";
                    contentMenuTypes.appendChild(buttonAll);
                    
                    result.data.forEach((item, index) => {
                        
                        const button = document.createElement("button");
                        button.classList.add("button-type-menu", "oferta-menu")
                        button.id = `btnMenuType-${index}`;
                        button.innerText = item.type
                        button.dataset.idtype = item.idType; 
                        button.type = "button";

                        contentMenuTypes.appendChild(button);
                    });
                } else {
                    console.error(result.message);
                }
            }).catch((err) => {
                console.error(err);
            });
    }

    /**
     * Funcion que remueve la clase skeleton de los elementos
     */
    const removeSkeleton = () => {
        const contentItems = document.querySelector(`.wrapper-oferta`);
        const items = contentItems.querySelectorAll(`.swiper-oferta-slide-figure`);
        items.forEach(element => {
            element.classList.remove("skeleton-loader");
        });
    }

    /**
     * Funcion que obtiene todas las ofertas para ser mostradas en el slider
     */
    const getOferta = () => {
        let formData = new FormData();
        formData.append("method", "getOferta");
        asyncData(`/modules/mod_inicio/tmpl/model/oferta.php`, `POST`, formData)
            .then((result) => {
                if (result.status) {
                    const contentItemsOferta = document.querySelector(`.wrapper-oferta`)
                    sessionStorage.setItem("oferts", JSON.stringify(result.data));
                    result.data.forEach(oferta => {
                        const item = document.createElement("div");
                        item.classList.add("swiper-slide", "swiper-oferta-slide")
                        const figure = document.createElement("figure");
                        figure.classList.add("swiper-oferta-slide-figure", "skeleton-loader");
                        figure.dataset.type = oferta.type;
                        const linkOferta = document.createElement("a");
                        const nameOferta = oferta.nameProduct.replace(/\s+/g, "_");
                        linkOferta.href = `./oferta/?oferta=${oferta.modality}-${oferta.prod}-${nameOferta}`;
                        const imageThumb = document.createElement("img");
                        if(oferta.imageThumb != null && oferta.imageThumb != ""){
                            let image = oferta.imageThumb.replace(",", "");
                            imageThumb.src = image;
                        }else{
                            imageThumb.src = "/images/Spivet/Oferta/thumb_temporal.png";    
                        }
                        imageThumb.classList.add("item-thumb");
                        const itemInfo = document.createElement("div");
                        itemInfo.classList.add("item-ofer-info");
                        const nameProduct = document.createElement("p");
                        nameProduct.classList.add("name-ofer");
                        nameProduct.innerText = oferta.nameProduct;
                        const dateProduct = document.createElement("p");
                        dateProduct.innerText = oferta.date;
                        const modalityProduct = document.createElement("p");
                        modalityProduct.innerText = oferta.modality;
                        itemInfo.appendChild(nameProduct);
                        itemInfo.appendChild(dateProduct);
                        itemInfo.appendChild(modalityProduct);
                        linkOferta.appendChild(itemInfo);
                        linkOferta.appendChild(imageThumb);
                        //figure.appendChild(itemInfo);
                        figure.appendChild(linkOferta);
                        item.append(figure);
                        contentItemsOferta.appendChild(item);
                    });
                } else {
                    console.error(result.message);
                }
            }).catch((err) => {
                console.error(err);
            });
    }


    /**
     * Funciuon que incializa el componente de swiper slider
     */
    const initSwiperAlianza = () => {
        setTimeout(() => {
            let swiper = new Swiper(".mySwiperOferta", {
                cssMode: true,
                //lazy: true, 
                slidesPerView: 5,
                spaceBetween: 30,
                //freeMode: true,
                //centeredSlides: true,
                //loop: true,
                //loopFillGroupWithBlank: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                /* breakpoints: {
                    100: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    840: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    1000: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },

                    1300: {
                        slidesPerView: 4,
                        spaceBetween: 40,
                    },
                    1650: {
                        slidesPerView: 5,
                        spaceBetween: 40,
                    },
                }  */
                breakpoints: {
                    "@0.00": {
                      slidesPerView: 1,
                      spaceBetween: 10,
                    },
                    "@0.75": {
                      slidesPerView: 2,
                      spaceBetween: 20,
                    },
                    "@1.00": {
                      slidesPerView: 3,
                      spaceBetween: 40,
                    },
                    "@1.50": {
                      slidesPerView: 4,
                      spaceBetween: 50,
                    },
                  },
            });
            
            setTimeout(() => {
                removeSkeleton();  
                  
            }, 300);
            addStyleSrapper();
        }, 1500);
        
    }

    /**
     * Funcion que crea los items cuando se ejcuta un filtrado del menu de tipo
     * @param {array} arrayItems Informacion de las oferta
     */
    const createItemsOferts = (arrayItems) => {
        const contentItemsOferta = document.querySelector(`.wrapper-oferta`)
        contentItemsOferta.innerHTML = "";
        arrayItems.forEach(oferta => {
            const item = document.createElement("div");
            item.classList.add("swiper-slide", "swiper-oferta-slide")
            const figure = document.createElement("figure");
            figure.classList.add("swiper-oferta-slide-figure", "skeleton-loader");
            figure.dataset.type = oferta.type;
            const linkOferta = document.createElement("a");
            const nameOferta = oferta.nameProduct.replace(/\s+/g, "_");
            linkOferta.href = `./oferta/?oferta=${oferta.modality}-${oferta.prod}-${nameOferta}`;
            const imageThumb = document.createElement("img");
            if(oferta.imageThumb != null && oferta.imageThumb != ""){
                let image = oferta.imageThumb.replace(",", "");
                imageThumb.src = image;
            }else{
                imageThumb.src = "/images/Spivet/Oferta/thumb_temporal.png";    
            }
            imageThumb.classList.add("item-thumb");
            const itemInfo = document.createElement("div");
            itemInfo.classList.add("item-ofer-info");
            const nameProduct = document.createElement("p");
            nameProduct.classList.add("name-ofer");
            nameProduct.innerText = oferta.nameProduct;
            const dateProduct = document.createElement("p");
            dateProduct.innerText = oferta.date;
            const modalityProduct = document.createElement("p");
            modalityProduct.innerText = oferta.modality;
            itemInfo.appendChild(nameProduct);
            itemInfo.appendChild(dateProduct);
            itemInfo.appendChild(modalityProduct);
            linkOferta.appendChild(itemInfo);
            linkOferta.appendChild(imageThumb);
            //figure.appendChild(itemInfo);
            figure.appendChild(linkOferta);
            item.append(figure);
            contentItemsOferta.appendChild(item);
        }); 
        initSwiperAlianza();
    }


    /**
     * Funcion que obtiene todas las ofertas por tipo
     * @param {string} typeSelected Id del tipo seleccionado
     */
    const filterItemsOferts = (typeSelected) => { 
        let arrayItems = [];
        const itemsOferts = JSON.parse(sessionStorage.getItem("oferts"));
        if(typeSelected != "todos"){ 
            itemsOferts.forEach(element => {
                if(typeSelected == element.type){
                    arrayItems.push(element);
                }
            });
            createItemsOferts(arrayItems); 
        }else 
        createItemsOferts(itemsOferts);  
    }


    /**
     * Funcion que agrega una clase que centra los items del slider
     * Solo cuando no estan activos los botones de next y preview
     */
    const addStyleSrapper = () => {
        if( document.querySelector(".swiper-wrapper") ) {
            const swiperContent = document.querySelector(`.swiper-oferta`);
            const swiperWrapper = swiperContent.querySelector(".swiper-wrapper");
            swiperWrapper.classList.remove('swiper--center');
            const swiperBtnNext = swiperContent.querySelector(".swiper-button-next")
            const swiperBtnPrev = swiperContent.querySelector(".swiper-button-prev")
            if( swiperBtnNext.className.includes('swiper-button-disabled') && swiperBtnPrev.className.includes('swiper-button-disabled') ) {
                swiperWrapper.classList.add('swiper--center');
            }
        }
    }


    window.onresize = function(event) {
        addStyleSrapper();
    };

    /**
     * Funcion que escucha todos los click de la vista
     */
    document.addEventListener("click", (e) => {
        const idEle = e.target.id;
        if(idEle.includes("btnMenuType-")){
            const contentButtons = document.querySelectorAll(".button-type-menu");
            contentButtons.forEach(element => {
                if(element.classList.contains("type-selected"))
                element.classList.remove("type-selected");
            });
            const button = document.querySelector(`#${idEle}`)
            const idType = button.dataset.idtype;
            if(!button.classList.contains("type-selected")){
                button.classList.add("type-selected");
            }
            filterItemsOferts(idType);
        }
    })
    
    
     setTimeout(() => {
        getTypeOferts();
        getOferta(); 
        initSwiperAlianza();    
        }, 1000);
    /**
     * Funcion que se ejecuta al terminar de cargar el dom
     */
    window.addEventListener("DOMContentLoaded", () => {
        //Solo agregarlo cuando el mosulo esta en el servidor
        //getTypeOferts();
        //getOferta(); 
        //initSwiperAlianza();  
    });
})();