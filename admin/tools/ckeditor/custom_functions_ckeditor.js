const dataCkeditor = () => {
    let initDataCkeditor = {}
    const items = [
        // 'exportPDF','exportWord', '|',
        'findAndReplace', 'selectAll', '|',
        'heading', '|',
        'bold', 'italic', 'strikethrough', 'underline', 'code', '|',
        'bulletedList', 'numberedList', 'todoList', '|',
        'outdent', 'indent', '|',
        'fontSize', 'fontFamily', 
        'alignment', 'blockQuote', '|', 'link'

        /*
            'exportPDF','exportWord', '|',
            'findAndReplace', 'selectAll', '|',
            'heading', '|',
            'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
            'bulletedList', 'numberedList', 'todoList', '|',
            'outdent', 'indent', '|',
            'undo', 'redo',
            '-',
            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
            'alignment', '|',
            'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
            'specialCharacters', 'horizontalLine', 'pageBreak', '|',
            'textPartLanguage', '|',
            'sourceEditing'
        */
    ];

    const properties= {
        styles: true,
        startIndex: true,
        reversed: true
    };

    const options = [
        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
    ];

    const optionsLetter = [
        'default',
        'Arial, Helvetica, sans-serif',
        'Courier New, Courier, monospace',
        'Georgia, serif',
        'Lucida Sans Unicode, Lucida Grande, sans-serif',
        'Tahoma, Geneva, sans-serif',
        'Times New Roman, Times, serif',
        'Trebuchet MS, Helvetica, sans-serif',
        'Verdana, Geneva, sans-serif'
    ];

    const removePlugins = [
    // These two are commercial, but you can try them out without registering to a trial.
    // 'ExportPdf',
    // 'ExportWord',
    'CKBox',
    'CKFinder',
    'EasyImage',
    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
    // Storing images as Base64 is usually a very bad idea.
    // Replace it on production website with other solutions:
    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
    // 'Base64UploadAdapter',
    'RealTimeCollaborativeComments',
    'RealTimeCollaborativeTrackChanges',
    'RealTimeCollaborativeRevisionHistory',
    'PresenceList',
    'Comments',
    'TrackChanges',
    'TrackChangesData',
    'RevisionHistory',
    'Pagination',
    'WProofreader',
    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
    // from a local file system (file://) - load this site via HTTP server if you enable MathType
    'MathType',

    ];

    const feeds =  [
        {
            marker: '@',
            feed: [
                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                '@cupcake', '@danish', '@donut', '@dragﾃｩe', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflﾃｩ',
                '@sugar', '@sweet', '@topping', '@wafer'
            ],
            minimumCharacters: 1
        }
    ];

    initDataCkeditor = {
            
        toolbar: {
            items,
            shouldNotGroupWhenFull: true
        },
        language: 'es',
        list: {
            properties
        },
        
        heading: {
            options
        },
        
        placeholder: '',
        
        fontFamily: {
            optionsLetter,
            supportAllValues: true
        },
        
        fontSize: {
            options: [ 10, 12, 14, 'default', 18, 20, 22 ],
            supportAllValues: true
        },
        
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
        },
        
        htmlEmbed: {
            showPreviews: true
        },
        
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        
        mention: {
            feeds
        },
        
        removePlugins
    }

    return initDataCkeditor
}