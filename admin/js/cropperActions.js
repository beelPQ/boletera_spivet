window.addEventListener('DOMContentLoaded', function () {


  const widthRectangle= 985, heightRectangle= 354;
  const widthSquare = 680, heightSquare= 680;

    let imgsThumb = {}, imgsThumbCub = {};
    console.log('aplicacion')
    var avatarThumb1 = document.getElementById('avatarThumb1');
    var avatarThumb2 = document.getElementById('avatarThumb2');
    var avatarThumb3 = document.getElementById('avatarThumb3');

    var avatarThumbs1 = document.getElementById('avatarThumbs1');
    var avatarThumbs2 = document.getElementById('avatarThumbs2');
    var avatarThumbs3 = document.getElementById('avatarThumbs3');

    var avatarFacilitador = document.getElementById('avatarFacilitador');
    var avatarNota = document.getElementById('avatarNota');
    
    var imageThumb1 = document.getElementById('imageThumb1');
    var imageThumb2 = document.getElementById('imageThumb2');
    var imageThumb3 = document.getElementById('imageThumb3');

    var imageThumbs1 = document.getElementById('imageThumbs1');
    var imageThumbs2 = document.getElementById('imageThumbs2');
    var imageThumbs3 = document.getElementById('imageThumbs3');

    var imageFacilitador = document.getElementById('imageFacilitador');
    var imageNota = document.getElementById('imageNota');

    var inputThumb1 = document.getElementById('inputThumb1');
    var inputThumb2 = document.getElementById('inputThumb2');
    var inputThumb3 = document.getElementById('inputThumb3');

    var inputThumbs1 = document.getElementById('inputThumbs1');
    var inputThumbs2 = document.getElementById('inputThumbs2');
    var inputThumbs3 = document.getElementById('inputThumbs3');

    var inputFacilitador = document.getElementById('inputFacilitador');
    var inputNota = document.getElementById('inputNota');
    
   
    

    var $progress = $('.progress');
    var $progressBar = $('.progress-bar');
    var $alert = $('.alert');
    
    var $modalThumb1 = $('#modalThumb1');
    var $modalThumb2 = $('#modalThumb2');
    var $modalThumb3 = $('#modalThumb3');

    var $modalThumbs1 = $('#modalThumbs1');
    var $modalThumbs2 = $('#modalThumbs2');
    var $modalThumbs3 = $('#modalThumbs3');

    var $modalFacilitador = $('#modalFacilitador');
    var $modalNota = $('#modalNota');
    
    
    
    var cropper;

    $('[data-toggle="tooltip"]').tooltip();

    /* seccion input thumb */
    inputThumb1.addEventListener('change', function (e) {
        
      var files = e.target.files;
      var done = function (url) {
        inputThumb1.value = '';
        imageThumb1.src = url;
        $alert.hide();
        $modalThumb1.modal('show');
      };
      var reader;
      var file;
      var url;

      if (files && files.length > 0) {
        file = files[0];

        if (URL) {
          done(URL.createObjectURL(file));
        } else if (FileReader) {
          reader = new FileReader();
          reader.onload = function (e) {
            done(reader.result);
          };
          reader.readAsDataURL(file);
        }
      }
    });

    inputThumb2.addEventListener('change', function (e) {
        
      var files = e.target.files;
      var done = function (url) {
        inputThumb2.value = '';
        imageThumb2.src = url;
        $alert.hide();
        $modalThumb2.modal('show');
      };
      var reader;
      var file;
      var url;

      if (files && files.length > 0) {
        file = files[0];

        if (URL) {
          done(URL.createObjectURL(file));
        } else if (FileReader) {
          reader = new FileReader();
          reader.onload = function (e) {
            done(reader.result);
          };
          reader.readAsDataURL(file);
        }
      }
    });

    inputThumb3.addEventListener('change', function (e) {
        
      var files = e.target.files;
      var done = function (url) {
        inputThumb3.value = '';
        imageThumb3.src = url;
        $alert.hide();
        $modalThumb3.modal('show');
      };
      var reader;
      var file;
      var url;

      if (files && files.length > 0) {
        file = files[0];

        if (URL) {
          done(URL.createObjectURL(file));
        } else if (FileReader) {
          reader = new FileReader();
          reader.onload = function (e) {
            done(reader.result);
          };
          reader.readAsDataURL(file);
        }
      }
    });
    /* seccion input thumb */

    inputFacilitador.addEventListener('change', function (e) {
        console.log('click en el input falicitador')
      var files = e.target.files;
      var done = function (url) {
        inputFacilitador.value = '';
        imageFacilitador.src = url;
        $alert.hide();
        $modalFacilitador.modal('show');
      };
      var reader;
      var file;
      var url;

      if (files && files.length > 0) {
        file = files[0];

        if (URL) {
          done(URL.createObjectURL(file));
        } else if (FileReader) {
          reader = new FileReader();
          reader.onload = function (e) {
            done(reader.result);
          };
          reader.readAsDataURL(file);
        }
      }
    });

    inputNota.addEventListener('change', function (e) {
        
      var files = e.target.files;
      var done = function (url) {
        inputNota.value = '';
        imageNota.src = url;
        $alert.hide();
        $modalNota.modal('show');
      };
      var reader;
      var file;
      var url;

      if (files && files.length > 0) {
        file = files[0];

        if (URL) {
          done(URL.createObjectURL(file));
        } else if (FileReader) {
          reader = new FileReader();
          reader.onload = function (e) {
            done(reader.result);
          };
          reader.readAsDataURL(file);
        }
      }
    });

    /* seccion input thumbs */
    inputThumbs1.addEventListener('change', function (e) {
        
      var files = e.target.files;
      var done = function (url) {
        inputThumbs1.value = '';
        imageThumbs1.src = url;
        $alert.hide();
        $modalThumbs1.modal('show');
      };
      var reader;
      var file;
      var url;

      if (files && files.length > 0) {
        file = files[0];

        if (URL) {
          done(URL.createObjectURL(file));
        } else if (FileReader) {
          reader = new FileReader();
          reader.onload = function (e) {
            done(reader.result);
          };
          reader.readAsDataURL(file);
        }
      }
    });

    inputThumbs2.addEventListener('change', function (e) {
        
      var files = e.target.files;
      var done = function (url) {
        inputThumbs2.value = '';
        imageThumbs2.src = url;
        $alert.hide();
        $modalThumbs2.modal('show');
      };
      var reader;
      var file;
      var url;

      if (files && files.length > 0) {
        file = files[0];

        if (URL) {
          done(URL.createObjectURL(file));
        } else if (FileReader) {
          reader = new FileReader();
          reader.onload = function (e) {
            done(reader.result);
          };
          reader.readAsDataURL(file);
        }
      }
    });

    inputThumbs3.addEventListener('change', function (e) {
        
      var files = e.target.files;
      var done = function (url) {
        inputThumbs3.value = '';
        imageThumbs3.src = url;
        $alert.hide();
        $modalThumbs3.modal('show');
      };
      var reader;
      var file;
      var url;

      if (files && files.length > 0) {
        file = files[0];

        if (URL) {
          done(URL.createObjectURL(file));
        } else if (FileReader) {
          reader = new FileReader();
          reader.onload = function (e) {
            done(reader.result);
          };
          reader.readAsDataURL(file);
        }
      }
    });
     /* seccion input thumbs */


    /* seccion modalThumb */
    $modalThumb1.on('shown.bs.modal', function () {
      cropper = new Cropper(imageThumb1, {
        aspectRatio: 2,
        viewMode: 3,
        dragMode: 'crop', // 'crop', 'move' or 'none'
        // The initial aspect ratio of the crop box
        initialAspectRatio: NaN,
        // The aspect ratio of the crop box
        // aspectRatio: NaN,
        // An object with the previous cropping result data
        data: null,
        // A selector for adding extra containers to preview
        preview: '',
        // Re-render the cropper when resize the window
        responsive: true,
        // Restore the cropped area after resize the window
        restore: true,
        // Check if the current image is a cross-origin image
        checkCrossOrigin: true,
        // Check the current image's Exif Orientation information
        checkOrientation: true,
        // Show the black modal
        modal: true,
        // Show the dashed lines for guiding
        guides: true,
        // Show the center indicator for guiding
        center: true,
        // Show the white modal to highlight the crop box
        highlight: true,
        // Show the grid background
        background: true,
        // Enable to crop the image automatically when initialize
        autoCrop: true,
        // Define the percentage of automatic cropping area when initializes
        autoCropArea: 0.8,
        // Enable to move the image
        movable: true,
        // Enable to rotate the image
        rotatable: true,
        // Enable to scale the image
        scalable: true,
        // Enable to zoom the image
        zoomable: true,
        // Enable to zoom the image by dragging touch
        zoomOnTouch: true,
        // Enable to zoom the image by wheeling mouse
        zoomOnWheel: true,
        // Define zoom ratio when zoom the image by wheeling mouse
        wheelZoomRatio: 0.1,
        // Enable to move the crop box
        cropBoxMovable: true,
        // Enable to resize the crop box
        cropBoxResizable: true,
        // Toggle drag mode between "crop" and "move" when click twice on the cropper
        toggleDragModeOnDblclick: true,
        // Size limitation
        minCanvasWidth: 0,
        minCanvasHeight: 0,
        minCropBoxWidth: 0,
        minCropBoxHeight: 0,
        minContainerWidth: 200,
        minContainerHeight: 200,

        // Shortcuts of events
        ready: null,
        cropstart: null,
        cropmove: null,
        cropend: null,
        crop: null,
        zoom: null
      });
      initButtons1()
        btnMoveLeftT1.addEventListener('click', () => {
        cropper.move(-10, 0);
        })
        btnMoveRightT1.addEventListener('click', () => {
            cropper.move(10, 0);
        })
        btnMoveUpT1.addEventListener('click', () => {
            cropper.move(0, -10);
        })
        btnMoveDownT1.addEventListener('click', () => {
            cropper.move(0, 10);
        })
        btnZoomPlusT1.addEventListener('click', () => {
            cropper.zoom(0.1);
        })
        btnZoomMinusT1.addEventListener('click', () => {
            cropper.zoom(-0.1);
        })
        btnRotateLT1.addEventListener('click', () => {
            cropper.rotate(-10);
        })
        btnRotateRT1.addEventListener('click', () => {
            cropper.rotate(10);
        })
    }).on('hidden.bs.modal', function () {
      cropper.destroy();
      cropper = null;
    });


    $modalThumb2.on('shown.bs.modal', function () {
      cropper = new Cropper(imageThumb2, {
        aspectRatio: 2,
        viewMode: 3,
        dragMode: 'crop', // 'crop', 'move' or 'none'
        // The initial aspect ratio of the crop box
        initialAspectRatio: NaN,
        // The aspect ratio of the crop box
        // aspectRatio: NaN,
        // An object with the previous cropping result data
        data: null,
        // A selector for adding extra containers to preview
        preview: '',
        // Re-render the cropper when resize the window
        responsive: true,
        // Restore the cropped area after resize the window
        restore: true,
        // Check if the current image is a cross-origin image
        checkCrossOrigin: true,
        // Check the current image's Exif Orientation information
        checkOrientation: true,
        // Show the black modal
        modal: true,
        // Show the dashed lines for guiding
        guides: true,
        // Show the center indicator for guiding
        center: true,
        // Show the white modal to highlight the crop box
        highlight: true,
        // Show the grid background
        background: true,
        // Enable to crop the image automatically when initialize
        autoCrop: true,
        // Define the percentage of automatic cropping area when initializes
        autoCropArea: 0.8,
        // Enable to move the image
        movable: true,
        // Enable to rotate the image
        rotatable: true,
        // Enable to scale the image
        scalable: true,
        // Enable to zoom the image
        zoomable: true,
        // Enable to zoom the image by dragging touch
        zoomOnTouch: true,
        // Enable to zoom the image by wheeling mouse
        zoomOnWheel: true,
        // Define zoom ratio when zoom the image by wheeling mouse
        wheelZoomRatio: 0.1,
        // Enable to move the crop box
        cropBoxMovable: true,
        // Enable to resize the crop box
        cropBoxResizable: true,
        // Toggle drag mode between "crop" and "move" when click twice on the cropper
        toggleDragModeOnDblclick: true,
        // Size limitation
        minCanvasWidth: 0,
        minCanvasHeight: 0,
        minCropBoxWidth: 0,
        minCropBoxHeight: 0,
        minContainerWidth: 200,
        minContainerHeight: 200,

        // Shortcuts of events
        ready: null,
        cropstart: null,
        cropmove: null,
        cropend: null,
        crop: null,
        zoom: null
      });
      initButtons2()
      btnMoveLeftT2.addEventListener('click', () => {
        cropper.move(-10, 0);
        })
        btnMoveRightT2.addEventListener('click', () => {
            cropper.move(10, 0);
        })
        btnMoveUpT2.addEventListener('click', () => {
            cropper.move(0, -10);
        })
        btnMoveDownT2.addEventListener('click', () => {
            cropper.move(0, 10);
        })
        btnZoomPlusT2.addEventListener('click', () => {
            cropper.zoom(0.1);
        })
        btnZoomMinusT2.addEventListener('click', () => {
            cropper.zoom(-0.1);
        })
        btnRotateLT2.addEventListener('click', () => {
            cropper.rotate(-10);
        })
        btnRotateRT2.addEventListener('click', () => {
            cropper.rotate(10);
        })
    }).on('hidden.bs.modal', function () {
      cropper.destroy();
      cropper = null;
    });

    $modalThumb3.on('shown.bs.modal', function () {
      cropper = new Cropper(imageThumb3, {
        aspectRatio: 2,
        viewMode: 3,
        dragMode: 'crop', // 'crop', 'move' or 'none'
        // The initial aspect ratio of the crop box
        initialAspectRatio: NaN,
        // The aspect ratio of the crop box
        // aspectRatio: NaN,
        // An object with the previous cropping result data
        data: null,
        // A selector for adding extra containers to preview
        preview: '',
        // Re-render the cropper when resize the window
        responsive: true,
        // Restore the cropped area after resize the window
        restore: true,
        // Check if the current image is a cross-origin image
        checkCrossOrigin: true,
        // Check the current image's Exif Orientation information
        checkOrientation: true,
        // Show the black modal
        modal: true,
        // Show the dashed lines for guiding
        guides: true,
        // Show the center indicator for guiding
        center: true,
        // Show the white modal to highlight the crop box
        highlight: true,
        // Show the grid background
        background: true,
        // Enable to crop the image automatically when initialize
        autoCrop: true,
        // Define the percentage of automatic cropping area when initializes
        autoCropArea: 0.8,
        // Enable to move the image
        movable: true,
        // Enable to rotate the image
        rotatable: true,
        // Enable to scale the image
        scalable: true,
        // Enable to zoom the image
        zoomable: true,
        // Enable to zoom the image by dragging touch
        zoomOnTouch: true,
        // Enable to zoom the image by wheeling mouse
        zoomOnWheel: true,
        // Define zoom ratio when zoom the image by wheeling mouse
        wheelZoomRatio: 0.1,
        // Enable to move the crop box
        cropBoxMovable: true,
        // Enable to resize the crop box
        cropBoxResizable: true,
        // Toggle drag mode between "crop" and "move" when click twice on the cropper
        toggleDragModeOnDblclick: true,
        // Size limitation
        minCanvasWidth: 0,
        minCanvasHeight: 0,
        minCropBoxWidth: 0,
        minCropBoxHeight: 0,
        minContainerWidth: 200,
        minContainerHeight: 200,

        // Shortcuts of events
        ready: null,
        cropstart: null,
        cropmove: null,
        cropend: null,
        crop: null,
        zoom: null
      });
      initButtons3()
      btnMoveLeftT3.addEventListener('click', () => {
        cropper.move(-10, 0);
        })
        btnMoveRightT3.addEventListener('click', () => {
            cropper.move(10, 0);
        })
        btnMoveUpT3.addEventListener('click', () => {
            cropper.move(0, -10);
        })
        btnMoveDownT3.addEventListener('click', () => {
            cropper.move(0, 10);
        })
        btnZoomPlusT3.addEventListener('click', () => {
            cropper.zoom(0.1);
        })
        btnZoomMinusT3.addEventListener('click', () => {
            cropper.zoom(-0.1);
        })
        btnRotateLT3.addEventListener('click', () => {
            cropper.rotate(-10);
        })
        btnRotateRT3.addEventListener('click', () => {
            cropper.rotate(10);
        })
    }).on('hidden.bs.modal', function () {
      cropper.destroy();
      cropper = null;
    });
    /* seccion modalThumb */

    $modalFacilitador.on('shown.bs.modal', function () {
      cropper = new Cropper(imageFacilitador, {
        aspectRatio: 1,
        viewMode: 1,
        dragMode: 'crop', // 'crop', 'move' or 'none'
        // The initial aspect ratio of the crop box
        initialAspectRatio: NaN,
        // The aspect ratio of the crop box
        // aspectRatio: NaN,
        // An object with the previous cropping result data
        data: null,
        // A selector for adding extra containers to preview
        preview: '',
        // Re-render the cropper when resize the window
        responsive: true,
        // Restore the cropped area after resize the window
        restore: true,
        // Check if the current image is a cross-origin image
        checkCrossOrigin: true,
        // Check the current image's Exif Orientation information
        checkOrientation: true,
        // Show the black modal
        modal: true,
        // Show the dashed lines for guiding
        guides: true,
        // Show the center indicator for guiding
        center: true,
        // Show the white modal to highlight the crop box
        highlight: true,
        // Show the grid background
        background: true,
        // Enable to crop the image automatically when initialize
        autoCrop: true,
        // Define the percentage of automatic cropping area when initializes
        autoCropArea: 0.8,
        // Enable to move the image
        movable: true,
        // Enable to rotate the image
        rotatable: true,
        // Enable to scale the image
        scalable: true,
        // Enable to zoom the image
        zoomable: true,
        // Enable to zoom the image by dragging touch
        zoomOnTouch: true,
        // Enable to zoom the image by wheeling mouse
        zoomOnWheel: true,
        // Define zoom ratio when zoom the image by wheeling mouse
        wheelZoomRatio: 0.1,
        // Enable to move the crop box
        cropBoxMovable: true,
        // Enable to resize the crop box
        cropBoxResizable: true,
        // Toggle drag mode between "crop" and "move" when click twice on the cropper
        toggleDragModeOnDblclick: true,
        // Size limitation
        minCanvasWidth: 0,
        minCanvasHeight: 0,
        minCropBoxWidth: 0,
        minCropBoxHeight: 0,
        minContainerWidth: 200,
        minContainerHeight: 200,

        // Shortcuts of events
        ready: null,
        cropstart: null,
        cropmove: null,
        cropend: null,
        crop: null,
        zoom: null
      });
      initButtonsFa();
      btnMoveLeftFa.addEventListener('click', () => {
        cropper.move(-10, 0);
        })
        btnMoveRightFa.addEventListener('click', () => {
            cropper.move(10, 0);
        })
        btnMoveUpFa.addEventListener('click', () => {
            cropper.move(0, -10);
        })
        btnMoveDownFa.addEventListener('click', () => {
            cropper.move(0, 10);
        })
        btnZoomPlusFa.addEventListener('click', () => {
            cropper.zoom(0.1);
        })
        btnZoomMinusFa.addEventListener('click', () => {
            cropper.zoom(-0.1);
        })
        btnRotateLFa.addEventListener('click', () => {
            cropper.rotate(-10);
        })
        btnRotateRFa.addEventListener('click', () => {
            cropper.rotate(10);
        })
    }).on('hidden.bs.modal', function () {
      cropper.destroy();
      cropper = null;
    });

    $modalNota.on('shown.bs.modal', function () {
      cropper = new Cropper(imageNota, {
        aspectRatio: 2,
        viewMode: 1,
        dragMode: 'crop', // 'crop', 'move' or 'none'
        // The initial aspect ratio of the crop box
        initialAspectRatio: NaN,
        // The aspect ratio of the crop box
        // aspectRatio: NaN,
        // An object with the previous cropping result data
        data: null,
        // A selector for adding extra containers to preview
        preview: '',
        // Re-render the cropper when resize the window
        responsive: true,
        // Restore the cropped area after resize the window
        restore: true,
        // Check if the current image is a cross-origin image
        checkCrossOrigin: true,
        // Check the current image's Exif Orientation information
        checkOrientation: true,
        // Show the black modal
        modal: true,
        // Show the dashed lines for guiding
        guides: true,
        // Show the center indicator for guiding
        center: true,
        // Show the white modal to highlight the crop box
        highlight: true,
        // Show the grid background
        background: true,
        // Enable to crop the image automatically when initialize
        autoCrop: true,
        // Define the percentage of automatic cropping area when initializes
        autoCropArea: 0.8,
        // Enable to move the image
        movable: true,
        // Enable to rotate the image
        rotatable: true,
        // Enable to scale the image
        scalable: true,
        // Enable to zoom the image
        zoomable: true,
        // Enable to zoom the image by dragging touch
        zoomOnTouch: true,
        // Enable to zoom the image by wheeling mouse
        zoomOnWheel: true,
        // Define zoom ratio when zoom the image by wheeling mouse
        wheelZoomRatio: 0.1,
        // Enable to move the crop box
        cropBoxMovable: true,
        // Enable to resize the crop box
        cropBoxResizable: true,
        // Toggle drag mode between "crop" and "move" when click twice on the cropper
        toggleDragModeOnDblclick: true,
        // Size limitation
        minCanvasWidth: 0,
        minCanvasHeight: 0,
        minCropBoxWidth: 0,
        minCropBoxHeight: 0,
        minContainerWidth: 200,
        minContainerHeight: 200,

        // Shortcuts of events
        ready: null,
        cropstart: null,
        cropmove: null,
        cropend: null,
        crop: null,
        zoom: null
      });
      initButtonsNo();
      btnMoveLeftNo.addEventListener('click', () => {
        cropper.move(-10, 0);
        })
        btnMoveRightNo.addEventListener('click', () => {
            cropper.move(10, 0);
        })
        btnMoveUpNo.addEventListener('click', () => {
            cropper.move(0, -10);
        })
        btnMoveDownNo.addEventListener('click', () => {
            cropper.move(0, 10);
        })
        btnZoomPlusNo.addEventListener('click', () => {
            cropper.zoom(0.1);
        })
        btnZoomMinusNo.addEventListener('click', () => {
            cropper.zoom(-0.1);
        })
        btnRotateLNo.addEventListener('click', () => {
            cropper.rotate(-10);
        })
        btnRotateRNo.addEventListener('click', () => {
            cropper.rotate(10);
        })
    }).on('hidden.bs.modal', function () {
      cropper.destroy();
      cropper = null;
    });

    /* seccion modalThumb s*/
    $modalThumbs1.on('shown.bs.modal', function () {
      cropper = new Cropper(imageThumbs1, {
        aspectRatio: 1,
        viewMode: 1,
        dragMode: 'crop', // 'crop', 'move' or 'none'
        // The initial aspect ratio of the crop box
        initialAspectRatio: NaN,
        // The aspect ratio of the crop box
        // aspectRatio: NaN,
        // An object with the previous cropping result data
        data: null,
        // A selector for adding extra containers to preview
        preview: '',
        // Re-render the cropper when resize the window
        responsive: true,
        // Restore the cropped area after resize the window
        restore: true,
        // Check if the current image is a cross-origin image
        checkCrossOrigin: true,
        // Check the current image's Exif Orientation information
        checkOrientation: true,
        // Show the black modal
        modal: true,
        // Show the dashed lines for guiding
        guides: true,
        // Show the center indicator for guiding
        center: true,
        // Show the white modal to highlight the crop box
        highlight: true,
        // Show the grid background
        background: true,
        // Enable to crop the image automatically when initialize
        autoCrop: true,
        // Define the percentage of automatic cropping area when initializes
        autoCropArea: 0.8,
        // Enable to move the image
        movable: true,
        // Enable to rotate the image
        rotatable: true,
        // Enable to scale the image
        scalable: true,
        // Enable to zoom the image
        zoomable: true,
        // Enable to zoom the image by dragging touch
        zoomOnTouch: true,
        // Enable to zoom the image by wheeling mouse
        zoomOnWheel: true,
        // Define zoom ratio when zoom the image by wheeling mouse
        wheelZoomRatio: 0.1,
        // Enable to move the crop box
        cropBoxMovable: true,
        // Enable to resize the crop box
        cropBoxResizable: true,
        // Toggle drag mode between "crop" and "move" when click twice on the cropper
        toggleDragModeOnDblclick: true,
        // Size limitation
        minCanvasWidth: 0,
        minCanvasHeight: 0,
        minCropBoxWidth: 0,
        minCropBoxHeight: 0,
        minContainerWidth: 200,
        minContainerHeight: 200,

        // Shortcuts of events
        ready: null,
        cropstart: null,
        cropmove: null,
        cropend: null,
        crop: null,
        zoom: null
      });
      initButtonsTs1()
        btnMoveLeftTs1.addEventListener('click', () => {
        cropper.move(-10, 0);
        })
        btnMoveRightTs1.addEventListener('click', () => {
            cropper.move(10, 0);
        })
        btnMoveUpTs1.addEventListener('click', () => {
            cropper.move(0, -10);
        })
        btnMoveDownTs1.addEventListener('click', () => {
            cropper.move(0, 10);
        })
        btnZoomPlusTs1.addEventListener('click', () => {
            cropper.zoom(0.1);
        })
        btnZoomMinusTs1.addEventListener('click', () => {
            cropper.zoom(-0.1);
        })
        btnRotateLTs1.addEventListener('click', () => {
            cropper.rotate(-10);
        })
        btnRotateRTs1.addEventListener('click', () => {
            cropper.rotate(10);
        })
    }).on('hidden.bs.modal', function () {
      cropper.destroy();
      cropper = null;
    });


    $modalThumbs2.on('shown.bs.modal', function () {
      cropper = new Cropper(imageThumbs2, {
        aspectRatio: 1,
        viewMode: 1,
        dragMode: 'crop', // 'crop', 'move' or 'none'
        // The initial aspect ratio of the crop box
        initialAspectRatio: NaN,
        // The aspect ratio of the crop box
        // aspectRatio: NaN,
        // An object with the previous cropping result data
        data: null,
        // A selector for adding extra containers to preview
        preview: '',
        // Re-render the cropper when resize the window
        responsive: true,
        // Restore the cropped area after resize the window
        restore: true,
        // Check if the current image is a cross-origin image
        checkCrossOrigin: true,
        // Check the current image's Exif Orientation information
        checkOrientation: true,
        // Show the black modal
        modal: true,
        // Show the dashed lines for guiding
        guides: true,
        // Show the center indicator for guiding
        center: true,
        // Show the white modal to highlight the crop box
        highlight: true,
        // Show the grid background
        background: true,
        // Enable to crop the image automatically when initialize
        autoCrop: true,
        // Define the percentage of automatic cropping area when initializes
        autoCropArea: 0.8,
        // Enable to move the image
        movable: true,
        // Enable to rotate the image
        rotatable: true,
        // Enable to scale the image
        scalable: true,
        // Enable to zoom the image
        zoomable: true,
        // Enable to zoom the image by dragging touch
        zoomOnTouch: true,
        // Enable to zoom the image by wheeling mouse
        zoomOnWheel: true,
        // Define zoom ratio when zoom the image by wheeling mouse
        wheelZoomRatio: 0.1,
        // Enable to move the crop box
        cropBoxMovable: true,
        // Enable to resize the crop box
        cropBoxResizable: true,
        // Toggle drag mode between "crop" and "move" when click twice on the cropper
        toggleDragModeOnDblclick: true,
        // Size limitation
        minCanvasWidth: 0,
        minCanvasHeight: 0,
        minCropBoxWidth: 0,
        minCropBoxHeight: 0,
        minContainerWidth: 200,
        minContainerHeight: 200,

        // Shortcuts of events
        ready: null,
        cropstart: null,
        cropmove: null,
        cropend: null,
        crop: null,
        zoom: null
      });
      initButtonsTs2()
      btnMoveLeftTs2.addEventListener('click', () => {
        cropper.move(-10, 0);
        })
        btnMoveRightTs2.addEventListener('click', () => {
            cropper.move(10, 0);
        })
        btnMoveUpTs2.addEventListener('click', () => {
            cropper.move(0, -10);
        })
        btnMoveDownTs2.addEventListener('click', () => {
            cropper.move(0, 10);
        })
        btnZoomPlusTs2.addEventListener('click', () => {
            cropper.zoom(0.1);
        })
        btnZoomMinusTs2.addEventListener('click', () => {
            cropper.zoom(-0.1);
        })
        btnRotateLTs2.addEventListener('click', () => {
            cropper.rotate(-10);
        })
        btnRotateRTs2.addEventListener('click', () => {
            cropper.rotate(10);
        })
    }).on('hidden.bs.modal', function () {
      cropper.destroy();
      cropper = null;
    });

    $modalThumbs3.on('shown.bs.modal', function () {
      cropper = new Cropper(imageThumbs3, {
        aspectRatio: 1,
        viewMode: 1,
        dragMode: 'crop', // 'crop', 'move' or 'none'
        // The initial aspect ratio of the crop box
        initialAspectRatio: NaN,
        // The aspect ratio of the crop box
        // aspectRatio: NaN,
        // An object with the previous cropping result data
        data: null,
        // A selector for adding extra containers to preview
        preview: '',
        // Re-render the cropper when resize the window
        responsive: true,
        // Restore the cropped area after resize the window
        restore: true,
        // Check if the current image is a cross-origin image
        checkCrossOrigin: true,
        // Check the current image's Exif Orientation information
        checkOrientation: true,
        // Show the black modal
        modal: true,
        // Show the dashed lines for guiding
        guides: true,
        // Show the center indicator for guiding
        center: true,
        // Show the white modal to highlight the crop box
        highlight: true,
        // Show the grid background
        background: true,
        // Enable to crop the image automatically when initialize
        autoCrop: true,
        // Define the percentage of automatic cropping area when initializes
        autoCropArea: 0.8,
        // Enable to move the image
        movable: true,
        // Enable to rotate the image
        rotatable: true,
        // Enable to scale the image
        scalable: true,
        // Enable to zoom the image
        zoomable: true,
        // Enable to zoom the image by dragging touch
        zoomOnTouch: true,
        // Enable to zoom the image by wheeling mouse
        zoomOnWheel: true,
        // Define zoom ratio when zoom the image by wheeling mouse
        wheelZoomRatio: 0.1,
        // Enable to move the crop box
        cropBoxMovable: true,
        // Enable to resize the crop box
        cropBoxResizable: true,
        // Toggle drag mode between "crop" and "move" when click twice on the cropper
        toggleDragModeOnDblclick: true,
        // Size limitation
        minCanvasWidth: 0,
        minCanvasHeight: 0,
        minCropBoxWidth: 0,
        minCropBoxHeight: 0,
        minContainerWidth: 200,
        minContainerHeight: 200,

        // Shortcuts of events
        ready: null,
        cropstart: null,
        cropmove: null,
        cropend: null,
        crop: null,
        zoom: null
      });
      initButtonsTs3()
      btnMoveLeftTs3.addEventListener('click', () => {
        cropper.move(-10, 0);
        })
        btnMoveRightTs3.addEventListener('click', () => {
            cropper.move(10, 0);
        })
        btnMoveUpTs3.addEventListener('click', () => {
            cropper.move(0, -10);
        })
        btnMoveDownTs3.addEventListener('click', () => {
            cropper.move(0, 10);
        })
        btnZoomPlusTs3.addEventListener('click', () => {
            cropper.zoom(0.1);
        })
        btnZoomMinusTs3.addEventListener('click', () => {
            cropper.zoom(-0.1);
        })
        btnRotateLTs3.addEventListener('click', () => {
            cropper.rotate(-10);
        })
        btnRotateRTs3.addEventListener('click', () => {
            cropper.rotate(10);
        })
    }).on('hidden.bs.modal', function () {
      cropper.destroy();
      cropper = null;
    });
    /* seccion modalThumb s*/


    // ThumbHead1
    document.getElementById('cropThumb1').addEventListener('click', function () {
      var initialAvatarURL;
      var canvas;
      $modalThumb1.modal('hide');
      if (cropper) {
        canvas = cropper.getCroppedCanvas({
          width: widthRectangle,
          height: heightRectangle,
        });
        initialAvatarURL = avatarThumb1.src;
        avatarThumb1.src = canvas.toDataURL();
        imgsThumb.img_1 = canvas.toDataURL();
        sessionStorage.setItem('imgsThumb', JSON.stringify(imgsThumb));
        $alert.removeClass('alert-success alert-warning');
        canvas.toBlob(function (blob) {
          var formData = new FormData();
          formData.append('avatar', blob, 'avatar.jpg');
        });
      }
    });

    // ThumbHead2
    document.getElementById('cropThumb2').addEventListener('click', function () {
      var initialAvatarURL;
      var canvas;
      $modalThumb2.modal('hide');
      if (cropper) {
        canvas = cropper.getCroppedCanvas({
          width: widthRectangle,
          height: heightRectangle,
        });
        initialAvatarURL = avatarThumb2.src;
        avatarThumb2.src = canvas.toDataURL();
        imgsThumb.img_2 = canvas.toDataURL();
        sessionStorage.setItem('imgsThumb', JSON.stringify(imgsThumb));
        $alert.removeClass('alert-success alert-warning');
        canvas.toBlob(function (blob) {
        var formData = new FormData();
          console.log('Crop2 ');
          formData.append('avatar', blob, 'avatar.jpg');
        });
      }
    });

    // ThumbHead3
    document.getElementById('cropThumb3').addEventListener('click', function () {
      var initialAvatarURL;
      var canvas;
      $modalThumb3.modal('hide');
      if (cropper) {
        canvas = cropper.getCroppedCanvas({
          width: widthRectangle,
          height: heightRectangle,
        });
        initialAvatarURL = avatarThumb3.src;
        avatarThumb3.src = canvas.toDataURL();
        imgsThumb.img_3 = canvas.toDataURL();
        sessionStorage.setItem('imgsThumb', JSON.stringify(imgsThumb) );
        $alert.removeClass('alert-success alert-warning');
        canvas.toBlob(function (blob) {
        var formData = new FormData();
          console.log('Crop3 ');
          formData.append('avatar', blob, 'avatar.jpg');
        });
      }
    });

    // ThumbProfile
    document.getElementById('cropFacilitador').addEventListener('click', function () {
      var initialAvatarURL;
      var canvas;
      $modalFacilitador.modal('hide');
      if (cropper) {
        canvas = cropper.getCroppedCanvas({
          width: widthSquare,
          height: heightSquare,
        });
        initialAvatarURL = avatarFacilitador.src;
        avatarFacilitador.src = canvas.toDataURL();
        sessionStorage.setItem('imgFacilitador', canvas.toDataURL());
        $alert.removeClass('alert-success alert-warning');
        canvas.toBlob(function (blob) {
        var formData = new FormData();
          formData.append('avatar', blob, 'avatar.jpg');
        });
      }
    });

    // ThumbBlog
    document.getElementById('cropNota').addEventListener('click', function () {
      var initialAvatarURL;
      var canvas;
      $modalNota.modal('hide');
      if (cropper) {
        canvas = cropper.getCroppedCanvas({
          width: widthRectangle,
          height: heightRectangle,
        });
        initialAvatarURL = avatarNota.src;
        avatarNota.src = canvas.toDataURL();
        sessionStorage.setItem('imgNote', canvas.toDataURL());
        $alert.removeClass('alert-success alert-warning');
        canvas.toBlob(function (blob) {
        var formData = new FormData();
          formData.append('avatar', blob, 'avatar.jpg');
        });
      }
      document.querySelector(`#btnDeleteImage`).style.display = "block";
      
    });

    // Thumb1
    document.getElementById('cropThumbs1').addEventListener('click', function () {
      var initialAvatarURL;
      var canvas;
      $modalThumbs1.modal('hide');
      if (cropper) {
        canvas = cropper.getCroppedCanvas({
          width: widthSquare,
          height: heightSquare,
        });
        initialAvatarURL = avatarThumbs1.src;
        avatarThumbs1.src = canvas.toDataURL();
        imgsThumbCub.img_1 = canvas.toDataURL();
        sessionStorage.setItem('imgsThumbCub', JSON.stringify(imgsThumbCub) );
        $alert.removeClass('alert-success alert-warning');
        canvas.toBlob(function (blob) {
        var formData = new FormData();
          formData.append('avatar', blob, 'avatar.jpg');
        });
      }
    });

    // Thumb2
    document.getElementById('cropThumbs2').addEventListener('click', function () {
      var initialAvatarURL;
      var canvas;
      $modalThumbs2.modal('hide');
      if (cropper) {
        canvas = cropper.getCroppedCanvas({
          width: widthSquare,
          height: heightSquare,
        });
        initialAvatarURL = avatarThumbs2.src;
        avatarThumbs2.src = canvas.toDataURL();
        imgsThumbCub.img_2 = canvas.toDataURL();
        sessionStorage.setItem('imgsThumbCub', JSON.stringify(imgsThumbCub) );
        $alert.removeClass('alert-success alert-warning');
        canvas.toBlob(function (blob) {
        var formData = new FormData();
          formData.append('avatar', blob, 'avatar.jpg');
        });
      }
    });

    // Thumb3
    document.getElementById('cropThumbs3').addEventListener('click', function () {
      var initialAvatarURL;
      var canvas;
      $modalThumbs3.modal('hide');
      if (cropper) {
        canvas = cropper.getCroppedCanvas({
          width: widthSquare,
          height: heightSquare,
        });
        initialAvatarURL = avatarThumbs3.src;
        avatarThumbs3.src = canvas.toDataURL();
        imgsThumbCub.img_3 = canvas.toDataURL();
        sessionStorage.setItem('imgsThumbCub', JSON.stringify(imgsThumbCub) );
        $alert.removeClass('alert-success alert-warning');
        canvas.toBlob(function (blob) {
        var formData = new FormData();
          formData.append('avatar', blob, 'avatar.jpg');
        });
      }
    });
    /* seccion accion de boton recorte Thumb s*/

    const initButtons1 = () =>{
      let btnMoveLeftT1 = document.getElementById('btnMoveLeftT1')
      let btnMoveRightT1 = document.getElementById('btnMoveRightT1')
      let btnMoveUpT1 = document.getElementById('btnMoveUpT1')
      let btnMoveDownT1 = document.getElementById('btnMoveDownT1')
      let btnZoomPlusT1 = document.getElementById('btnZoomPlusT1')
      let btnZoomMinusT1 = document.getElementById('btnZoomMinusT1')
      let btnRotateLT1 = document.getElementById('btnRotateLT1')
      let btnRotateRT1 = document.getElementById('btnRotateRT1')
    }

    const initButtons2 = () =>{
      let btnMoveLeftT2 = document.getElementById('btnMoveLeftT2')
      let btnMoveRightT2 = document.getElementById('btnMoveRightT2')
      let btnMoveUpT2 = document.getElementById('btnMoveUpT2')
      let btnMoveDownT2 = document.getElementById('btnMoveDownT2')
      let btnZoomPlusT2 = document.getElementById('btnZoomPlusT2')
      let btnZoomMinusT2 = document.getElementById('btnZoomMinusT2')
      let btnRotateLT2 = document.getElementById('btnRotateLT2')
      let btnRotateRT2 = document.getElementById('btnRotateRT2')
    }

    const initButtons3 = () =>{
      let btnMoveLeftT3 = document.getElementById('btnMoveLeftT3')
      let btnMoveRightT3 = document.getElementById('btnMoveRightT3')
      let btnMoveUpT3 = document.getElementById('btnMoveUpT3')
      let btnMoveDownT3 = document.getElementById('btnMoveDownT3')
      let btnZoomPlusT3 = document.getElementById('btnZoomPlusT3')
      let btnZoomMinusT3 = document.getElementById('btnZoomMinusT3')
      let btnRotateLT3 = document.getElementById('btnRotateLT3')
      let btnRotateRT3 = document.getElementById('btnRotateRT3')
    }

    const initButtonsTs1 = () =>{
      let btnMoveLeftTs1 = document.getElementById('btnMoveLeftTs1')
      let btnMoveRightTs1 = document.getElementById('btnMoveRightTs1')
      let btnMoveUpTs1 = document.getElementById('btnMoveUpTs1')
      let btnMoveDownTs1 = document.getElementById('btnMoveDownTs1')
      let btnZoomPlusTs1 = document.getElementById('btnZoomPlusTs1')
      let btnZoomMinusTs1 = document.getElementById('btnZoomMinusTs1')
      let btnRotateLTs1 = document.getElementById('btnRotateLTs1')
      let btnRotateRTs1 = document.getElementById('btnRotateRTs1')
    }

    const initButtonsTs2 = () =>{
      let btnMoveLeftTs2 = document.getElementById('btnMoveLeftTs2')
      let btnMoveRightTs2 = document.getElementById('btnMoveRightTs2')
      let btnMoveUpTs2 = document.getElementById('btnMoveUpTs2')
      let btnMoveDownTs2 = document.getElementById('btnMoveDownTs2')
      let btnZoomPlusTs2 = document.getElementById('btnZoomPlusTs2')
      let btnZoomMinusTs2 = document.getElementById('btnZoomMinusTs2')
      let btnRotateLTs2 = document.getElementById('btnRotateLTs2')
      let btnRotateRTs2 = document.getElementById('btnRotateRTs2')
    }

    const initButtonsTs3 = () =>{
      let btnMoveLeftTs3 = document.getElementById('btnMoveLeftTs3')
      let btnMoveRightTs3 = document.getElementById('btnMoveRightTs3')
      let btnMoveUpTs3 = document.getElementById('btnMoveUpTs3')
      let btnMoveDownTs3 = document.getElementById('btnMoveDownTs3')
      let btnZoomPlusTs3 = document.getElementById('btnZoomPlusTs3')
      let btnZoomMinusTs3 = document.getElementById('btnZoomMinusTs3')
      let btnRotateLTs3 = document.getElementById('btnRotateLTs3')
      let btnRotateRTs3 = document.getElementById('btnRotateRTs3')
    }


    const initButtonsFa = () =>{
      let btnMoveLeftFa = document.getElementById('btnMoveLeftFa')
      let btnMoveRightFa = document.getElementById('btnMoveRightFa')
      let btnMoveUpFa = document.getElementById('btnMoveUpFa')
      let btnMoveDownFa = document.getElementById('btnMoveDownFa')
      let btnZoomPlusFa = document.getElementById('btnZoomPlusFa')
      let btnZoomMinusFa = document.getElementById('btnZoomMinusFa')
      let btnRotateLFa = document.getElementById('btnRotateLFa')
      let btnRotateRFa = document.getElementById('btnRotateRFa')
    }

    const initButtonsNo = () =>{
      let btnMoveLeftNo = document.getElementById('btnMoveLeftNo')
      let btnMoveRightNo = document.getElementById('btnMoveRightNo')
      let btnMoveUpNo = document.getElementById('btnMoveUpNo')
      let btnMoveDownNo = document.getElementById('btnMoveDownNo')
      let btnZoomPlusNo = document.getElementById('btnZoomPlusNo')
      let btnZoomMinusNo = document.getElementById('btnZoomMinusNo')
      let btnRotateLNo = document.getElementById('btnRotateLNo')
      let btnRotateRNo = document.getElementById('btnRotateRNo')
    }
  });