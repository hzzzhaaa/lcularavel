$(document).ready(function () {
    $('#dataTableEvent').DataTable({
        "order": [[1, "asc"]]
    });
    $('#dtVerticalScrollExample').DataTable({
        "scrollY": "200px",
        "scrollCollapse": true,
    });
    $('.dataTables_length').addClass('bs-select');
});
