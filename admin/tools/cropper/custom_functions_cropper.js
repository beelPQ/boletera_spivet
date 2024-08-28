let visorCropper = document.getElementById('visorCropper'); //visor en modal
let showModalCropper = document.getElementById('showModalCropper'); //boton invocar modal
let btnSaveCrop = document.getElementById('btnSaveCrop'); //boton guardar en modal
let cropper = '';

let btnCloseModalCropper = document.getElementById('closeCrop'); //boton cancel en modal

const initCrop = (typeCrop,minCroppedWidth,minCroppedHeight,maxCroppedWidth,maxCroppedHeight) => {
    
    if(typeCrop==1){
        
        cropper = new Cropper(visorCropper, {
          aspectRatio: 1, //NaN
          viewMode: 1, //0
          dragMode: 'move', //crop
          responsive: true, //true
          movable: true, //true
          zoomable: true, //true
          scalable: true, //true
          zoomOnWheel: true, //true
          minContainerWidth:200, //200
          minContainerHeight: 200, //100
          minCanvasWidth:20, //0
          minCanvasHeight: 20, //0
        });
        
    }else if(typeCrop==2){
       
        cropper = new Cropper(visorCropper, {
          aspectRatio: NaN, //NaN
          viewMode: 1, //0
          dragMode: 'move', //crop
          responsive: true, //true
          movable: true, //true
          zoomable: true, //true
          scalable: true, //true
          zoomOnWheel: true, //true
          minContainerWidth:200, //200
          minContainerHeight: 200, //100
          minCanvasWidth:20, //0
          minCanvasHeight: 20, //0
          data: {
            width: (minCroppedWidth + maxCroppedWidth) / 2,
            height: (minCroppedHeight + maxCroppedHeight) / 2,
          },
          crop: function (event) {
              var width = event.detail.width;
              var height = event.detail.height;
        
              if ( width < minCroppedWidth || height < minCroppedHeight || width > maxCroppedWidth || height > maxCroppedHeight) {
                cropper.setData({
                  width: Math.max(minCroppedWidth, Math.min(maxCroppedWidth, width)),
                  height: Math.max(minCroppedHeight, Math.min(maxCroppedHeight, height)),
                });
              }
          }
          
          
        });
        
    }
   
}

const destroyCrop = () => {
    cropper.destroy();
    cropper = '';
}

//se ejecuta al dar clic al preview
const previewCropper = (preview,idInputFile) =>{
    
    if(preview.src.includes('data:image')){
        
    }else{
        document.querySelector(`#`+idInputFile).click();
    }
}

//se ejecuta cuando se selecciona una imagen para recortar
const inputCropper = (inputFile,idPreview,widthPreview,heightPreview,widthCrop,heightCrop,typeCrop,minWidthCrop,minHeightCrop,maxWidthCrop,maxHeightCrop,e) =>{
    
    let reader;
    let file;
    let url;
    
    let fileUpload = e.target.files;
    let done = function (url){
        inputFile.value = '';
        visorCropper.src = url;
        btnSaveCrop.setAttribute("onclick", "saveCrop('"+idPreview+"',"+widthCrop+","+heightCrop+","+widthPreview+","+heightPreview+",event)");
        showModalCropper.click();
    }
    
    if (fileUpload && fileUpload.length > 0) {
        
        file = fileUpload[0];
        
        if (URL) {
            done(URL.createObjectURL(file));
        } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
              done(reader.result);
            };
            reader.readAsDataURL(file);
        }
        
        if(document.querySelector(`#visorCropper`)){
            
            if(typeof cropper == 'object'){
                console.log('osv_destroy1')
                destroyCrop();
            }
            setTimeout(() => {
                initCrop(typeCrop,minWidthCrop,minHeightCrop,maxWidthCrop,maxHeightCrop);
            }, 250);
            
        }
        
    }
    
}

//se ejecuta cuando se da clic en recortar o en guardar el recorte
const saveCrop = (idPreviewCrop,widthCrop,heightCrop,widthPreview,heightPreview,e) =>{
    
    let previewCrop = document.querySelector(`#${idPreviewCrop}`);
    let initialAvatarURL;
    let canvas;
    
    if (cropper) {
      canvas = cropper.getCroppedCanvas({
        width: widthCrop,
        height: heightCrop
      });
      initialAvatarURL = previewCrop.src;
      previewCrop.width = widthPreview;
      previewCrop.height = heightPreview;
      previewCrop.src = canvas.toDataURL();
      
      canvas.toBlob(function (blob) {
        //console.log(blob);
      });
    }
    console.log('osv_destroy2')
    destroyCrop();
    btnCloseModalCropper.click();
    document.getElementById(idPreviewCrop+'_delete').style.display = "block";
    
}

//se ejecuta cuando se limpia el recorte
const cleanPreview = (btnClean,idPreview,e) =>{
    
    let preview = document.querySelector(`#${idPreview}`);
    preview.width = 100;
    preview.height = 100;
    preview.src = `images/components/empty_image.png` ;
    
    if(!preview.src.includes('data:image')){
        setTimeout(() => {
            btnClean.style.display = "none";
            cropper = '';
        }, 100); 
    }
    
}