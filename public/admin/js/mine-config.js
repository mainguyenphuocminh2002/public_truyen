$(document).ready(function () {
    try {


        // $("#editor").each(function (index, el) {
        //     CKEDITOR.replace($(this).attr("id"), {
        //         height: "300px"
        //     });
        // });
        // $("#editorContent").each(function (index, el) {
        //     CKEDITOR.replace($(this).attr("id"), {
        //         height: "500px"
        //     });
        // });

    } catch (e) {
        console.log(e);
    }

    // You can use the "CKFinder" class to render CKFinder in a page:
    
})
function BrowseServer(idInput, thumbnail,token,user) {
    let files = document.getElementById(idInput).files;
    console.log(files[0]);
    const allowtypes = ['image/jpg', 'image/png', 'image/jpeg'];
    const maxfilesize = 4194304;
    if (!allowtypes.includes(files[0].type)) {
        return;
    }
    if (maxfilesize < files[0].size) {
        return;
    }
    var fd = new FormData();
    fd.append('image', files[0]);
    fd.append('_token', token);
    fd.append('user', user);
    $.ajax({
        type: "POST",
        url: "/api/handleImage",
        data: fd,
        contentType: false,
        processData: false,
        success: function (response) {
            document.getElementById(thumbnail).src = response;
        }
    });
}

