

// const avatar = document.getElementById('avatar') || null;
let avatarImgG = null;
const input = document.getElementById('input') || null;
let image = document.getElementById('image') || null;
let btnModal = document.getElementById('btnModalCrop') || null;
const btnSaveCrop = document.getElementById('crop') || null;
const btnCloseModal = document.getElementById('closeCrop') || null;
const btnCloseModalX = document.getElementById('closeModalx') || null;
const btnDeleteImg = document.getElementById('btnDeleteImg') || null;
const contentPreviewImg = document.querySelector('.content_preview_image') || null;
let fileUpload = '';
let done = '';
let cropper;

let reader;
let file;
let url;

const initCrop = () => {
    cropper = new Cropper(image, {
        aspectRatio: 1,
        viewMode: 1,
        dragMode: 'move',
        responsive: true,
        movable: true,
        zoomable: true,
        scalable: true,
        zoomOnWheel: true,
        minContainerWidth: 200,
        minContainerHeight: 200,
        minCanvasWidth: 20,
        minCanvasHeight: 20,
    });
}
const destroyCrop = () => {
    if (cropper !== null) cropper.destroy();
    cropper = null;
}
if (input !== null) {
    input.addEventListener('change', (e) => {
        fileUpload = e.target.files;
        done = function (url) {
            input.value = '';
            image.src = url;
            btnModal.click();
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
            if (document.querySelector(`#image`)) {
                if (typeof cropper == 'object') {
                    destroyCrop();
                }
                setTimeout(() => {
                    initCrop();
                }, 250);

            }
        }
    });
}
if (btnCloseModal !== null) {
    btnCloseModal.addEventListener('click', (e) => {
        //destroyCrop();
    });
}
if (btnCloseModalX !== null) {
    btnCloseModalX.addEventListener('click', (e) => {
        //destroyCrop();
    });
}

export const deleteImageCropPreview = (avatarExternal = null) => {
    if (avatarExternal !== null) avatarImgG = avatarExternal;
    avatarImgG.src = `${location.origin}/modules/mod_buycarform/tmpl/assets/plugin/img/logo_subir_imagen.png`;
    contentPreviewImg.style.display = 'none';
    if (!avatarImgG.src.includes('data:image')) {
        setTimeout(() => {
            btnDeleteImg.style.display = "none";
            cropper = null;
        }, 100);
    }
}
if (btnDeleteImg !== null) {
    btnDeleteImg.addEventListener('click', (e) => {
        deleteImageCropPreview();
    });
}
if (btnSaveCrop !== null) {
    btnSaveCrop.addEventListener('click', () => {
        let initialAvatarURL;
        let canvas;
        if (cropper) {
            canvas = cropper.getCroppedCanvas({
                width: 260,
                height: 260,
            });
            contentPreviewImg.removeAttribute(`style`);
            initialAvatarURL = avatarImgG.src;
            avatarImgG.src = canvas.toDataURL();
            canvas.toBlob(function (blob) {
                //console.log(blob);
            });
        }
        destroyCrop();
        btnCloseModal.click();
        btnDeleteImg.style.display = "block";
    });
}

export function initCropperJs(avatar) {
    if (avatar !== null) {
        avatarImgG = avatar;
        if (!avatar.src.includes('data:image')) input.click();
    }
}