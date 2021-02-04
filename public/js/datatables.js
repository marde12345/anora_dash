$(document).ready(function () {
    $('#list_users_table').DataTable(
        {
            columnDefs: [
                { width: 100, targets: -1 }
            ],
        }
    );
    $('#list_userupgraderole_table').DataTable(
        {
            columnDefs: [
                { width: 100, targets: -1 }
            ],
        }
    );
});
