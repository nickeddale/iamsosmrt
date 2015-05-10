/*! sustainabilityspecified 03-05-2015 */
function liveEditor() {
    function sendContentUpdates() {
        0 !== Object.keys(contentToUpload).length && $.ajax({
            type: "POST",
            dataType: "json",
            headers: {
                "X-CSRF-Token": $token
            },
            url: url,
            data: contentToUpload,
            success: function(data) {
                contentToUpload = {};
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status), console.log(thrownError);
            }
        });
    }
    var contentToUpload = {}, $token = $('meta[name="_token"]').attr("content");
    window.setInterval(sendContentUpdates, 3e3), tinymce.init({
        selector: "input.editable",
        theme: "modern",
        skin: "light",
        inline: !0,
        plugins: [ "advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste" ],
        toolbar: "undo redo | styleselect | bold italic | bullist numlist outdent indent | link image | emissions"
    });
}

function navChange() {
    $(document).scroll(function() {
        $docScroll = $(document).scrollTop();
        var section = $("#nav-reveal"), offset = section.offset(), top = offset.top, bottom = top + section.outerHeight() - 200;
        $docScroll > bottom && $("#nav-background, #bs-example-navbar-collapse-1, #dropdown-menu").addClass("navbar-color"), 
        $docScroll < bottom && $("#nav-background, #bs-example-navbar-collapse-1, #dropdown-menu").removeClass("navbar-color");
    });
}

$(document).ready(function() {
    setInterval(navChange(), 300);
});