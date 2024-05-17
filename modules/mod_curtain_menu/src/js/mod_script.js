(() => {
    'use strict'

    /** Funcion para realizar peticiones asincronas */
    const fechtAsycn = async (uri, method, typeRes, formData = []) => {
        let params = {}, request;
        if (method == 'GET') {
            params = {
                method: "GET",
                redirect: "follow",
                // headers: {
                //     "X-CSRF-TOKEN": document.querySelector("#csrfToken").getAttribute("content"),
                //     pragma: 'no-cache',
                //     cache: 'reload',
                //     'Cache-Control': 'no-cache',
                // },
            };
        } else if (method == "POST") {
            params = {
                method: "POST",
                body: formData,
                /*
                headers: {
                    // 'Content-Type': 'application/json',
                    // 'Authorization': `Bearer ${token}`
                    // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    "X-CSRF-TOKEN": document
                        .querySelector("#csrfToken")
                        .getAttribute("content"),
                },
                */

                // headers: {
                //     'Accept': 'application/json',
                //     'Content-Type': 'application/json'
                // },
                // body: JSON.stringify({'mi_dato_1':data2, 'mi_dato_2':'Hola', }) ,
                /* headers: {
                    pragma: 'no-cache',
                    cache: 'reload',
                    'Cache-Control': 'no-cache',
                }, */

            };
        }

        const response = await fetch(uri, params);
        if (typeRes == "json") request = await response.json();
        else request = await response.text();
        return request;
    }

    /** Agregamos la clase aal elemntos seleccionado que no haya sido activado
     * 
     * @param {Element} pqOverlayScreen : Div contenedor de todos los menús
     * @param {Array} subMenus : Listado de submenús existentes
     * @param {Element} itemLink : Link seleccionado
     * @param {Element} ulModMenu : Lista de menú principal
     * @param {Number} thisItem : Bandera validadora para saber si se remueven las clases active
     * de todos los link del menú principal
    */
    const addActiveClass = (pqOverlayScreen, subMenus, itemLink, ulModMenu, thisItem = 0) => {
        if (thisItem == 0) delActiveClass(pqOverlayScreen)
        subMenus.forEach(list => {
            if (list.classList.contains('show')) {
                itemLink.classList.add('active')
                ulModMenu.classList.add('mod-menu-show')
                pqOverlayScreen.classList.add('show_submenu')
            }
        });
    }
    /** Eliminamos la clave active
     * 
     * @param {Elelment} pqOverlayScreen : Div contenedor de todos los menús
    */
    const delActiveClass = (pqOverlayScreen) => {
        const listParentItem = pqOverlayScreen.querySelectorAll('.mod-menu li')
        listParentItem.forEach(child => child.classList.remove('active'));
    }

    /** Mandamos a cargar los servicios y cursos que exitan en la BD
     * 
     */
    const getItems = (linkThis, typeProduct) => {
        //console.log(linkThis)
        // let formData = new FormData();
        // formData.append("typeProduct", typeProduct)
        fechtAsycn(`/modules/mod_curtain_menu/controllers/CurtainMenuController.php?typeProduct=${typeProduct}`, `GET`, `json`)
            .then(response => {
                const { status, message, description, data } = response;
                if (status) {
                    let itemId = 0;
                    const liParentItem = linkThis.parentElement;
                    liParentItem.classList.add(`deeper`, `parent`, `parent_list`);
                    if (Reflect.has(liParentItem.dataset, 'itemid')) itemId = liParentItem.dataset.itemid;
                    const ulCollapse = document.createElement(`ul`);
                    ulCollapse.classList.add(`mod-menu__sub`, `list-unstyled`, `small`);
                    ulCollapse.id = `collapseSubmenu${itemId}`;
                    ulCollapse.innerHTML = '';

                    data.forEach(categoriesCourses => {
                        const { category } = categoriesCourses;
                        let serviceCourse = [];
                        if (Reflect.has(categoriesCourses, 'services')) serviceCourse = categoriesCourses.services;
                        if (Reflect.has(categoriesCourses, 'courses')) serviceCourse = categoriesCourses.courses;
                        //console.log(categoriesCourses);
                        if (serviceCourse.length > 0) {
                            const liCollapse = document.createElement(`li`);
                            liCollapse.classList.add(`nav-item`, `deeper`, `parent`);
                            const childLinkParent = document.createElement(`a`);
                            childLinkParent.classList.add(`disablelink`);
                            childLinkParent.href = `#`,
                                childLinkParent.innerHTML = category;
                            liCollapse.appendChild(childLinkParent);
                            // Sublista para Servicios/Cursos encontrados encontrados
                            const subUlCollapse = document.createElement(`ul`);
                            subUlCollapse.classList.add(`mod-menu__sub`, `list-unstyled`, `small`, `show`);//show es para que el menu este abierto
                            serviceCourse.forEach(service => {
                                const { id, name } = service;
                                const nameService = name.replace(/\s+/g, "_");
                                const subLiCollapse = document.createElement(`li`);
                                subLiCollapse.classList.add(`nav-item`);
                                const linkService = document.createElement(`a`);
                                //if( typeProduct == 'courses' ) linkService.href = `/index.php/curso-detalle?course=${id}`;
                                if (typeProduct == 'services') linkService.href = `/oferta/?oferta=${service.modality}-${service.number}-${nameService}`;
                                linkService.innerHTML = name;
                                subLiCollapse.appendChild(linkService);
                                subUlCollapse.appendChild(subLiCollapse);
                            });
                            liCollapse.appendChild(subUlCollapse);
                            ulCollapse.appendChild(liCollapse);
                        }

                    });
                    liParentItem.appendChild(ulCollapse);
                    linkThis.addEventListener(`click`, () => itemClick(liParentItem, linkThis, itemId));
                    linkThis.click();
                }
            })
            .catch(error => {
                console.log(error);
                /* Swal.fire({
                    title: 'Problemas al cargar la inforación',
                    text: "Se volverá a recargar la página",
                    icon: 'warning',
                    // showCancelButton: true,
                    // confirmButtonColor: '#3085d6',
                    // cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar',
                }) */
                /* .then((result) => {
                    if (result.isConfirmed) {
                      location.reload(false);
                    }
                  }) */
            })
    }


    /** Acciones para mostrar u ocultar opciones adiconales */
    const itemClick = (liParent, aThis, idUl) => {
        if (idUl > 0) {
            const listCollapse = liParent.querySelector(`#collapseSubmenu${idUl}`);
            if (listCollapse.classList.contains(`show`)) {
                aThis.classList.remove(`click`);
                listCollapse.classList.remove(`show`);
            }
            else {
                aThis.classList.add(`click`);
                listCollapse.classList.add(`show`);
            }
            const secundaryCollapses = listCollapse.querySelectorAll(`ul.mod-menu__sub.list-unstyled.small`)
            secundaryCollapses.forEach(list => {
                list.classList.add(`showChild`);
            });
        }

    }
    /** Obtenemos el link principal para agregar evento click
     * @param Element pqOverlayScreen : Contenedor principal de los links en el menu hamburguesa
     */
    const viewSubitems = (pqOverlayScreen) => {
        // console.clear();
        const listMenuSubItem = pqOverlayScreen.querySelectorAll(`ul.menu__sub__item`);
        listMenuSubItem.forEach(ulList => {
            if (!ulList.classList.contains(`primary`)) pqOverlayScreen.removeChild(ulList);
        });

        const menuSubItem = pqOverlayScreen.querySelector(`ul.primary`)
        const items = menuSubItem.querySelectorAll('li')
        items.forEach(item => {
            // Ingresamos si hay submenus listos
            if (item.classList.contains(`parent`)) {
                let itemId = 0;
                if (Reflect.has(item.dataset, 'itemid')) itemId = item.dataset.itemid;
                if (item.children[0].href == '') {
                    item.classList.add(`parent_list`);
                    const linkParentTag = item.children[0];
                    linkParentTag.classList.add(`clssParentLink`);
                    linkParentTag.addEventListener(`click`, () => itemClick(item, linkParentTag, itemId))
                }
            }
            // No hay submenus creados para indicar el elemento padre
            else {
                const link = item.querySelector(`a`);
                if (link.href == '') {
                    link.classList.add(`clssParentLink`);
                    //if( link.classList.contains(`coursesP`) ) getItems(link, `courses`);
                    if (link.classList.contains(`servicesP`)) getItems(link, `services`);

                }
            }
        });

    }




    /** Fución para mostrar submenú
     * 
     * @param {Event} e : Evento del documento
    */
    const showSubMenu = (e) => {
        const link = e.target
        let item = link
        e.preventDefault()
        if (link.tagName == 'A') item = link.parentElement
        const ulModMenu = item.parentElement
        const pqOverlayScreen = ulModMenu.parentElement
        if (!ulModMenu.classList.contains('view_submenu')) { delActiveClass(pqOverlayScreen); }

        if (Reflect.has(item.dataset, 'itemid')) {
            const subMenus = pqOverlayScreen.querySelectorAll('.menu__sub__item')
            const ulModMenu = item.parentElement
            if (item.classList.contains('active')) {
                addActiveClass(pqOverlayScreen, subMenus, item, ulModMenu, 1);
                return;
            }
            pqOverlayScreen.classList.remove('show_submenu')
            const itemId = item.dataset.itemid
            ulModMenu.classList.remove('mod-menu-show')

            subMenus.forEach(list => {
                if (Reflect.has(list.dataset, 'parentid')) {
                    if (list.dataset.parentid == itemId) {
                        list.classList.toggle('show')
                        list.classList.remove('hide')
                    }
                    else {
                        list.classList.remove('show')
                        list.classList.toggle('hide')
                    }
                }
            });

            addActiveClass(pqOverlayScreen, subMenus, item, ulModMenu);
        }
    }

    /** Generamos el link a partir de la clase del elemento
     * 
     * @param {Element} list : UL de federaciones
    */
    const replaceGenUri = (list) => {
        const items = list.querySelectorAll('li')
        items.forEach((item, index) => {
            const link = item.querySelector('a');
            if (link.className.trim() != '') {
                const splitClass = link.className.split('|')
                if (splitClass.length == 2) {
                    if (splitClass[1].trim() != '') {
                        link.href = splitClass[1]
                        link.setAttribute('target', '_blank');
                    }
                    else {
                        link.href = '#';
                        link.classList.add('disablelink');
                    }
                }
                // Agregamos clase collapse al elemento padre
                const clssParentLink = link.className;
                if (clssParentLink.includes('co_parent')) {
                    const parentList = link.parentElement;
                    parentList.parentElement.classList.add(`primary`);
                    link.removeAttribute('href');
                } else if (clssParentLink.includes('option_movil')) {

                }
                else link.removeAttribute('class');

            }
            // Link sin clase
            else {
                if (link.href.includes('#')) {
                    link.classList.add('disablelink');
                }
            }

        });
    }

    // Verificamos los submenus secundarios, que contengas más elemenos hijos
    const adEventSuboptionMenu = (menuSub) => {
        menuSub.forEach(subItem => {
            if (subItem.className.includes('show')) {
                const liItem = subItem.querySelectorAll('li')
                liItem.forEach(item => {
                    item.classList.remove('show_sub');
                    if (item.className.includes('deeper parent')) {
                        item.addEventListener('click', e => {
                            item.classList.add('show_sub');
                        })
                    }
                });
            }
        });
    }
    window.addEventListener("load", function (event) {
        setTimeout(() => {
            if (location.pathname.includes(`carrito-de-capacitaciones`)) {
                document.querySelector(`#headerContent`).classList.add(`incar`);
            }
            const headerContent = document.querySelector(`#headerContent`)
            const toPqoverlay = headerContent.querySelector(`#to_pqoverlay`)

            if (toPqoverlay.querySelector(`.mod-menu`)) {
                toPqoverlay.classList.add('pqoverlay')
                // Se activa Menú cortina
                if (toPqoverlay.querySelector('#checkMenu')) {
                    const hamburger = toPqoverlay.querySelector('.hamburger')
                    const inputCheck = toPqoverlay.querySelector('#checkMenu')
                    const pqOverlayScreen = toPqoverlay.querySelector('#pqOverlayScreen')
                    inputCheck.addEventListener('click', () => {
                        if (pqOverlayScreen.classList.contains('show')) {
                            pqOverlayScreen.classList.replace(`show`, `hide`);
                            hamburger.classList.replace(`white`, `blue`);
                        }
                        else if (pqOverlayScreen.classList.contains('hide')) {
                            pqOverlayScreen.classList.replace(`hide`, `show`);
                            hamburger.classList.replace(`blue`, `white`);
                        }
                        else {
                            pqOverlayScreen.classList.toggle(`show`);
                            hamburger.classList.toggle(`white`);
                        }

                        const ulModMenu = pqOverlayScreen.querySelector('.mod-menu')
                        const menuSub = pqOverlayScreen.querySelectorAll('.mod-menu__sub');
                        const clssParentLink = pqOverlayScreen.querySelectorAll('.clssParentLink');
                        // Mostramos el submenú
                        if (ulModMenu.classList.contains('view_submenu')) {
                            pqOverlayScreen.classList.add(`show_submenu`) // Mostramos clase de submenú
                            ulModMenu.classList.add('mod-menu-show')
                            if (menuSub.length > 0) {
                                menuSub[0].classList.add('show');
                                // setTimeout(() => adEventSuboptionMenu(menuSub) , 100);

                                // Eliminamos clase show de submenus al cerrar la cortina
                                /* menuSub.forEach( list => {
                                    if( !list.classList.contains(`primary`) )
                                        list.classList.remove('show');
                                }); */
                                // Eliminamos clase click de los items padres
                                //clssParentLink.forEach( link => link.classList.remove(`click`) );
                            }

                        }
                        else { // Flujo normal del menú
                            pqOverlayScreen.classList.remove(`show_submenu`) // Eliminamos clase de submenú

                            // Eliminamos clase Activa
                            delActiveClass(pqOverlayScreen)

                            ulModMenu.classList.remove('mod-menu-show')
                            if (menuSub.length > 0) { menuSub.forEach(list => list.classList.remove('show')); }
                        }
                        document.body.classList.toggle(`no_scroll`)

                    })

                    // === Reacomadamos menú con sus niveles respectivos ===

                    const modMenu = pqOverlayScreen.querySelector('.mod-menu')
                    const itemsPrincipalMenu = modMenu.querySelectorAll('li')
                    itemsPrincipalMenu.forEach(item => {
                        if (item.childElementCount > 1) {
                            item.querySelector('a').href = '#';
                            // item.addEventListener('click', showSubMenu); // ? Evento click en opciones principales con submenus [Moroni - 15May2024]
                        }

                        // ? Copiar url para iniciar sesión y eliminar elemento
                        const linkText = item.innerText;
                        // if( linkText.toUpperCase().includes('INICIAR SESIÓN') || linkText.toUpperCase().includes('INICIAR') ) {
                        if (linkText.toUpperCase().includes('INICIO SESIÓN COMPRA') || linkText.toUpperCase().includes('INICIO')) {
                            const linkLogin = item.querySelector(`a`);
                            // item.addEventListener('click', () => localStorage.setItem('inlogin', linkLogin.href) );
                            localStorage.setItem('inlogin', linkLogin.href)
                            modMenu.removeChild(item);
                        }
                        // ? Copiar url para perfil de usuario
                        if (linkText.toUpperCase().includes('MI PERFIL') || linkText.toUpperCase().includes('PERFIL')) {
                            const linkLogin = item.querySelector(`a`);
                            localStorage.setItem('user_profile', linkLogin.href);
                        }
                        // ? Agregar evento al link de Cerrar sesión
                        if (linkText.toUpperCase().includes('CERRAR SESIÓN') || linkText.toUpperCase().includes('CERRAR')) {
                            item.addEventListener('click', () => {
                                document.body.removeAttribute('data-id');
                                document.body.removeAttribute('data-name');
                                document.body.removeAttribute('data-email');
                                // localStorage.removeItem('user_profile');
                                // localStorage.removeItem('inlogin');
                                // localStorage.removeItem('userid');
                                localStorage.clear();
                                sessionStorage.clear();
                            });
                        }

                    });

                    /** Verificamos si se debe agregar o no el logo del sitio */
                    if (toPqoverlay.querySelector('.navbar-brand a img') && dataAddMenu.getAttribute('data-addlogosite')) {
                        const imgLogoSite = toPqoverlay.querySelector('.navbar-brand a img');;
                        const addlogosite = dataAddMenu.getAttribute('data-addlogosite');
                        if (addlogosite == 1) {
                            let srcLogoSite = '';
                            if (imgLogoSite.src != '') srcLogoSite = imgLogoSite.src;
                            const firstChild = modMenu.querySelector('li:first-child');
                            const itemLogoSite = document.createElement('li');
                            itemLogoSite.classList.add('img_logo');
                            const imgLogo = document.createElement('img');
                            imgLogo.src = srcLogoSite;
                            imgLogo.classList.add('logosite');
                            itemLogoSite.appendChild(imgLogo);
                            itemLogoSite.addEventListener('click', () => location.href = location.origin);
                            modMenu.insertBefore(itemLogoSite, firstChild); // Insertar antes del nodo seleccionado
                        }
                    }


                    // Agregamos línea entre menus e icono
                    const lineIcon = document.createElement('div')
                    lineIcon.classList.add('line__spacer')

                    /** Verificamos si necesitamos agregar el icono 
                     * entre los títulos y los subtítulos
                     */
                    const iconmenu = dataAddMenu.getAttribute('data-iconmenu');
                    if (iconmenu != '') {
                        const iconSapcer = document.createElement('img')
                        let srcImage = iconmenu;
                        if (iconmenu.charAt(0) != '/') srcImage = `/${iconmenu}`;
                        iconSapcer.src = srcImage;
                        // iconSapcer.src = `/images/icon_menu.svg`;
                        iconSapcer.alt = 'Spacer menú'
                        iconSapcer.setAttribute('width', '30');
                        lineIcon.appendChild(iconSapcer)
                    }


                    const line = document.createElement('div')
                    line.classList.add('line')
                    lineIcon.appendChild(line)
                    pqOverlayScreen.appendChild(lineIcon)
                    // Sacamos el submenu al nivel del menú principal
                    const subMenus = pqOverlayScreen.querySelectorAll('.mod-menu__sub')
                    if (subMenus.length > 0) {
                        subMenus.forEach(list => {
                            list.classList.replace('list-unstyled', 'menu__sub__item')
                            replaceGenUri(list) // Provicional
                            const listSubmenu = list.cloneNode(true);
                            pqOverlayScreen.appendChild(listSubmenu)
                            listSubmenu.removeAttribute('id');
                            const parentList = list.parentElement
                            parentList.removeChild(list);
                        });
                        viewSubitems(pqOverlayScreen); // Buscamos link parent para agregar evento click
                    } else modMenu.classList.add('no__submenu');

                    // Agergamos el la imagen del patrocinador y fondo de menú
                    if (dataAddMenu.getAttribute('data-backimage')) {
                        const backimage = dataAddMenu.getAttribute('data-backimage');

                        if (backimage == '') return;
                        let srcBackImage = backimage;
                        if (iconmenu.charAt(0) != '/') srcBackImage = `/${backimage}`;
                        const backFigure = document.createElement('figure');
                        const backimageElement = document.createElement('img');
                        backimageElement.src = srcBackImage;
                        backFigure.appendChild(backimageElement);
                        if (dataAddMenu.getAttribute('data-sponsor')) {
                            const sponsor = dataAddMenu.getAttribute('data-sponsor');
                            let srcSponsorImage = sponsor;
                            if (iconmenu.charAt(0) != '/') srcSponsorImage = `/${sponsor}`;
                            const sponsarImage = document.createElement('img');
                            sponsarImage.src = srcSponsorImage;
                            sponsarImage.classList.add('img_sponsor');
                            backFigure.appendChild(sponsarImage);
                        }

                        pqOverlayScreen.appendChild(backFigure);
                    }
                }
                else {
                    const modMenu = toPqoverlay.querySelector('.mod-menu')
                    const itemsPrincipalMenu = modMenu.querySelectorAll('li')
                    itemsPrincipalMenu.forEach(item => {
                        if (item.childElementCount > 1) {
                            item.removeChild(item.children[0]);
                        }
                    });
                }

                setTimeout(() => {
                    if (document.querySelector(`.spinner`)) {
                        document.querySelector(`.spinner`).style.display = "none";
                    }
                }, 1000);

            }


        }, 30);



    });
})()