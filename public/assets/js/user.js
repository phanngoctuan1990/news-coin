$(function () {
    $('#id-users').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '/admin/user/datatables',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'full_name', name: 'full_name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
        }
    });
});
