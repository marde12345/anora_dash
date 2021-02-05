function confirmation_delete(name) {
    return confirm('Yakin menghapus ' + name + '?');
}

$(document).on("click", ".open_userUpgradeModalTolak", function () {
    var userId = $(this).data('id');
    var route = "userupgraderole/" + userId;
    $(".modal-body #formTolak").attr('action', route);
    // As pointed out in comments, 
    // it is unnecessary to have to manually call the modal.
    // $('#addBookDialog').modal('show');
});