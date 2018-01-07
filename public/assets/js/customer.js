$(function () {
    $('#customer-list').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '/admin/customer/datatables',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
        }
    });
});
