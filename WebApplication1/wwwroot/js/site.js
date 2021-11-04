// Please see documentation at https://docs.microsoft.com/aspnet/core/client-side/bundling-and-minification
// for details on configuring this project to bundle and minify static web assets.

$("#AnnulerPost").click(function () {
    $("#addingPost").hide();
});
$("#AjouterPost").click(function () {
    $("#addingPost").show();
});


$("button").click(function () {
    $idButton = "#" + this.id;
    $verification = $idButton.replace(/\d+/g, '')
    //Button See comment
    if ($verification === "#comment") {
        $($idButton).click(function () {
            $idcommentSection = "#Section" + this.id
            if ($($idcommentSection).css('display') == 'none') {
                $($idButton).html('Hide comments');
            } else {
                $($idButton).html('See comments');
            }
            $($idcommentSection).toggle();
        });
    }

    //Button Create comment
    if ($verification === "#createComment") {
        $($idButton).click(function () {
            $idcommentSection = "#Section" + this.id
            if ($($idcommentSection).css('display') == 'none') {
                $($idButton).html('Cancel comment');
            } else {
                $($idButton).html('Create comment');
            }
            $($idcommentSection).toggle();
        });
    }
}); 

