$("#AnnulerPost").click(function() {
    $("#addingPost").hide();
    $("#postTextArea").val('');
    $("#titleInput").val('');
});

$("#AjouterPost").click(function() {
    $("#addingPost").show();
});