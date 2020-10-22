import * as FilePond from 'filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
var FilepondUpload = {
    inti : function ()
    {
        // FilePond.setOptions({
        //     server: {
        //         url: DOMAIN,
        //         process: {
        //             url: './cms-admin/ajax/upload-images',
        //             method: 'POST',
        //             withCredentials: false,
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //             timeout: 7000,
        //             onload: (response) => {
        //                 let objectResult = JSON.parse(response)
        //                 console.log(objectResult.file)
        //                 $("#avatar_uploads").val(objectResult.file)
        //             },
        //             onerror: null,
        //         }
        //     },
        // });

        FilePond.registerPlugin(
            FilePondPluginImagePreview,
        );
        FilePond.create( document.querySelector('input[type="file"]'))

    }
}
export default FilepondUpload
