(() => {
    
    let path = window.location.origin;

    /**
     **Funcion encargada de ejecutar una peticion al servidor
     * @param {string} url direccion 
     * @param {string} method tipo de metodo post o get
     * @param {object} formData objeto FormData que contiene los parametros a enviar
     * @returns json que contiene la respuesta del serividor
    */
     const asyncData = async (url, method, formData) => {
        let options = [];
        if(method == "GET"){
            options = {method: "GET"};
        }else {
            options = { method: "POST", body: formData };
        } 
        const response = await fetch(url, options)
        return await response.json();
    } 


    const formatMoney = (quantity) => {
        return new Intl.NumberFormat('en-Latn-US',{
            style: "currency",
            currency: "USD",
            maximumFractionDigits: 2,
          }).format(quantity);
    }


    const getCourse = (idCourse) => {
        let data = new FormData();
        data.append("method", "getCouseDetail");
        data.append("code", idCourse);
        asyncData(`/modules/mod_oferta_detail/tmpl/model/courseDetail.php`, `POST`, data)
        .then((result) => {
            if(result.status){
                
                let res = result.data;
                document.querySelector(`#titleCourse`).innerText = res.name
                document.querySelector(`#codeCourse`).value = res.code;
                document.querySelector(`#dateCourse`).innerText = res.fecha;
                document.querySelector(`#durationTime`).innerText = res.timeDuration;
                document.querySelector(`#costPayment`).innerText = `MXN $${res.preciomxn}`;
                document.querySelector(`#modalityType`).innerText = res.modality;
                if(res.imgBackgroudHead != ""){
                    if(res.imgBackgroudHead.includes(",")){
                        let imgBackgroudHeadName = res.imgBackgroudHead.split(",");
                        document.querySelector(`#imageBackgroudHead`).style.backgroundImage = `url(${path}${imgBackgroudHeadName[0]})`;
                    }else{
                        document.querySelector(`#imageBackgroudHead`).style.backgroundImage = `url(${path}${res.imgBackgroudHead})`;
                    }
                }else{
                    document.querySelector(`#imageBackgroudHead`).style.backgroundImage = `url(${path}/images/common/banner_aux.png)`;
                }
                
                
                document.querySelector(`#descriptCourse`).innerHTML = res.description;
                document.querySelector(`#objCourse`).innerHTML = res.objetivo;
                if(res.imgTeacher != ""){
                    if(res.imgTeacher.includes(",")){
                        let imgTeacherName = res.imgTeacher.split(",");
                        document.querySelector(`.image-teacher`).style.backgroundImage = `url(${path}${imgTeacherName[0]})`;
                    }else{
                        document.querySelector(`.image-teacher`).style.backgroundImage = `url(${path}${res.imgTeacher})`;
                    }
                }else{
                    document.querySelector(`.image-teacher`).style.backgroundImage = `url(${path}/images/common/perfil_aux.png)`;
                }
                
                
                document.querySelector(`.name-teacher-course`).innerText = res.impartidopor

                

                const btnAdd = document.querySelector(`#btnAddCar`);
                btnAdd.dataset.code = res.code;
                btnAdd.dataset.name = res.name;
                btnAdd.dataset.pricemxn = res.preciomxn;
                btnAdd.dataset.modality = res.modality;
                btnAdd.dataset.priceusd = 0;

                if(res.stock == 0){
                    btnAdd.setAttribute("disabled", "false")
                    btnAdd.classList.remove('btn-add-car')
                    btnAdd.classList.add('btn-add-car-disabled')
                }else{

                }

                if(Date.parse(res.dateInitCourse) < Date.parse(res.currentDate)){
                    btnAdd.setAttribute("disabled", "false")
                    btnAdd.classList.remove('btn-add-car')
                    btnAdd.classList.add('btn-add-car-disabled') 
                    btnAdd.innerHTML = "NO HABILITADO"
                }


                if(localStorage.getItem(`cart_products`)){

                    let band = 0;
                    const produtsSelected = JSON.parse(localStorage.getItem(`cart_products`));
                    const inputCourse = document.querySelector(`#codeCourse`).value;
                    produtsSelected.forEach(element => {
                        if(element.code == inputCourse){
                            band = 1;
                        }
                    });

                    if(band == 1){
                        btnAdd.classList.add('btn-add-car-disabled') 
                        btnAdd.classList.remove('btn-add-car')
                        btnAdd.setAttribute("disabled", "false")
                        btnAdd.innerHTML = "AGREGADO";
                    }
                }   

                //btnAdd.dataset.code = res.code;

                let contactoTeacher = ``;

                if(res.whats !== "no_data"){
                    contactoTeacher += `
                    <div class="icons-info flex">
                        <div class="icon">
                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.504 0h-.008C7.846 0 0 7.849 0 17.5a17.37 17.37 0 0 0 3.332 10.257L1.15 34.258l6.726-2.15A17.347 17.347 0 0 0 17.504 35C27.154 35 35 27.149 35 17.5 35 7.85 27.153 0 17.504 0zm10.183 24.712c-.422 1.192-2.098 2.181-3.434 2.47-.915.195-2.109.35-6.13-1.317-5.142-2.13-8.454-7.357-8.712-7.696-.248-.339-2.078-2.767-2.078-5.278 0-2.511 1.275-3.734 1.789-4.26.422-.43 1.12-.627 1.79-.627.216 0 .41.011.585.02.515.022.773.052 1.112.864.422 1.017 1.45 3.528 1.573 3.786.124.258.249.609.074.947-.164.35-.309.506-.567.803-.258.298-.503.525-.76.845-.237.277-.504.575-.207 1.09.298.502 1.326 2.18 2.84 3.527 1.953 1.74 3.537 2.295 4.104 2.532.422.175.925.133 1.233-.195.392-.422.875-1.122 1.368-1.811.35-.495.791-.556 1.255-.381.473.164 2.973 1.4 3.487 1.656.514.258.853.38.978.597.122.217.122 1.234-.3 2.428z" fill="#01002F"/>
                            </svg> 
                        </div>
                        <div class="text">
                            ${res.whats}
                        </div>
                    </div>    
                    `;
                }
                
               
                if(res.tel !== "no_data"){
                    
                    contactoTeacher += `
                    <div class="icons-info flex">
                        <div class="icon">
                            <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="m21.94 18.252-2.426 1.363a1.533 1.533 0 0 1-1.832-.25l-8.096-8.077a1.526 1.526 0 0 1-.251-1.828L10.7 7.04a2.285 2.285 0 0 0-.377-2.743L6.689.671A2.295 2.295 0 0 0 4.188.174a2.295 2.295 0 0 0-.745.497l-1.65 1.645a6.1 6.1 0 0 0-.92 7.46l.828 1.377a47.923 47.923 0 0 0 17.337 16.93l.163.095c2.438 1.39 5.45.984 7.403-.962l1.724-1.72a2.288 2.288 0 0 0 0-3.238L24.69 18.63a2.296 2.296 0 0 0-2.75-.377z" fill="#01002F"/>
                            </svg> 
                        </div>
                        <div class="text">
                            ${res.tel}
                        </div>
                    </div> `;
                }

                if(res.email !== "no_data" ){
                    contactoTeacher += `
                    <div class="icons-info flex">
                        <div class="icon">
                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 0C7.835 0 0 7.835 0 17.5S7.835 35 17.5 35 35 27.165 35 17.5 27.165 0 17.5 0zm-6.87 12.031h13.708c.727 0 .352.934-.044 1.172-.396.237-5.87 3.55-6.076 3.672a1.459 1.459 0 0 1-.734.182 1.444 1.444 0 0 1-.733-.182l-6.078-3.672c-.395-.238-.77-1.172-.044-1.172zm14.162 10.026c0 .383-.46.912-.81.912H11.018c-.35 0-.81-.529-.81-.912V15.41c0-.168-.003-.385.314-.2l6.229 3.673c.22.134.475.198.733.182.266 0 .459-.02.734-.182l6.26-3.672c.317-.186.314.033.314.2v6.647z" fill="#01002F"/>
                            </svg> 
                        </div>
                        <div class="text">
                            ${res.email}
                        </div>
                    </div> `;
                }   
                
                document.querySelector(`#itemDatosTeacher`).innerHTML = contactoTeacher;

                let contentCertify = '';
                if(res.certificado !== "no_data"){
                    let image = '';
                    if(res.certificado.includes(",")){
                        let partName = res.certificado.split(",");
                        image = partName[0];
                    }else{
                        image = res.certificado;
                    }

                    contentCertify = `
                    <span>CERTIFICADO POR:</span> <br>
                    <img src="${path}${image}" alt="" width="200" height="150">
                    `;
                }

                document.querySelector(`.content-certify`).innerHTML = contentCertify; 
                setTimeout(() => {
                    if(document.querySelector(`.spinner`)){
                        document.querySelector(`.spinner`).style.display = "none"; 
                    }    
                }, 500);
            }else{
                console.error(result)
                if(document.querySelector(`.spinner`)){
                    document.querySelector(`.spinner`).style.display = "none"; 
                }  
            }
        }).catch((err) => {
            console.error(err);
            if(document.querySelector(`.spinner`)){
                document.querySelector(`.spinner`).style.display = "none"; 
            }  
        });
    }   
    if(document.querySelector(`#codeCourse`)){
        const idCouse = document.querySelector(`#codeCourse`).value;
        getCourse(idCouse);
    }


    const btnShared = document.querySelector(`#btnShareNoti`);
    btnShared.addEventListener('click', (e) => {
        document.querySelector(`.content-shared`).classList.remove("desactive");
        document.querySelector(`.content-shared`).classList.add("active");
    });

    const btnClosedShared = document.querySelector(`#button-closed`);
    btnClosedShared.addEventListener('click', (e) => {
        document.querySelector(`.content-shared`).classList.remove("active");
        document.querySelector(`.content-shared`).classList.add("desactive");
    });

    const copy = document.querySelector(`#btnCopyHash`);
    copy.addEventListener('click', (e) => {
        console.log(`copiado`)
        let copyText = document.getElementById("txtInputHash"); 
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */
        
        document.execCommand("copy");

    });

    const btnAddCar = document.querySelector(`#btnAddCar`);
    btnAddCar.addEventListener('click', (e) => {
        const element = e.target.dataset;
        //console.log(element);
        localStorage.setItem("otherView", true);

        if(localStorage.getItem(`cart_products`)){
            const carProducts = JSON.parse(localStorage.getItem(`cart_products`));
            const txtCode = document.querySelector(`#codeCourse`).value;
            let exists = false;
            carProducts.forEach(element => {
                if(element.code == txtCode){
                    exists = true;
                }
            });
            if(exists){
                location.href = `${path}/servicios`;
            }else{

                if(element.modality == "Mixto"){
                    document.querySelector(`#btnModality`).click();
                    document.querySelector(`.modal-backdrop`).style.zIndex = "0";
                    document.querySelector(`.modal-backdrop`).style.background = "transparent";
                    document.querySelector(`.main-backimage`).style.zIndex = "1";
                    document.querySelector(`#staticBackdrop`).style.background = "#0000009e";
                    document.querySelector(`#headerContent`).style.zIndex = "1";
                    

                    const btnAccept = document.querySelector("#btnSelectionModality");
                    btnAccept.dataset.code = element.code;
                    btnAccept.dataset.name = element.name;
                    btnAccept.dataset.pricemxn = element.pricemxn;
                    btnAccept.dataset.priceusd = element.priceusd;
                    btnAccept.dataset.modality = "Virtual";

                    
                }else{
                    let pricemxn = element.pricemxn;
                    const rec = /,/gi
                    pricemxn = pricemxn.replace(rec,''); 
                    pricemxn = parseFloat(pricemxn);

                    //Actualizmos  la suma total 
                    let currentTotal = parseFloat(localStorage.getItem("amount")); 
                    currentTotal = currentTotal + pricemxn; 
                    localStorage.setItem("amount", currentTotal);


                    //Actualizmos  el subtotal 
                    let currentSubTotal = parseFloat(localStorage.getItem("subtotal")); 
                    currentSubTotal = currentSubTotal + pricemxn; 
                    localStorage.setItem("subtotal", currentSubTotal);
    
                    //agregamos el nuevo item a la session
                    let currentListCart = JSON.parse(localStorage.getItem("cart_products"));
                    let newProduct= {code:element.code,name:element.name,pricemxn:pricemxn,priceusd:0,typeItem:"Product",modality:element.modality}
                    currentListCart.push(newProduct);
                    localStorage.setItem("cart_products", JSON.stringify(currentListCart)); 

                    //redireccionamos al carrito
                    location.href = `${path}/servicios`;
                }

               
                
            }    
            
        }
    });


    const btnAccepModality = document.querySelector(`#btnSelectionModality`);
    btnAccepModality.addEventListener('click', (e) => {
        const element = e.target.dataset; 


        let pricemxn = element.pricemxn;
        const rec = /,/gi
        pricemxn = pricemxn.replace(rec,''); 
        pricemxn = parseFloat(pricemxn);

        //Actualizmos  la suma total 
        let currentTotal = parseFloat(localStorage.getItem("amount")); 
        currentTotal = currentTotal + pricemxn; 
        localStorage.setItem("amount", currentTotal);


        //Actualizmos  el subtotal 
        let currentSubTotal = parseFloat(localStorage.getItem("subtotal")); 
        currentSubTotal = currentSubTotal + pricemxn; 
        localStorage.setItem("subtotal", currentSubTotal);

        //agregamos el nuevo item a la session
        let currentListCart = JSON.parse(localStorage.getItem("cart_products"));
        let newProduct= {code:element.code,name:element.name,pricemxn:pricemxn,priceusd:0,typeItem:"Product",modality:element.modality}
        currentListCart.push(newProduct);
        localStorage.setItem("cart_products", JSON.stringify(currentListCart)); 

        //redireccionamos al carrito
        location.href = `${path}/index.php/carrito-de-capacitaciones`; 

    });


    const btnClosedModal = document.querySelector(`#btnClosedModal`);
    btnClosedModal.addEventListener('click', (e) => {
        document.querySelector(`#headerContent`).style.zIndex = "10";
    })

    const btnCerrarModal = document.querySelector(`#btnCerrarModal`);
    btnCerrarModal.addEventListener('click', (e) => {
        document.querySelector(`#headerContent`).style.zIndex = "10";
    })


    /**
     * *Evento para setear el tipo de modalidad seleccionada
     */
    document.addEventListener('change', (e) => {
        const btnAccept = document.querySelector(`#btnSelectionModality`);
        btnAccept.dataset.modality = e.target.value;
    });

})()
