$(function () {
    $('#category-coins').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '/admin/category-coin/datatables',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
        }
    });
});
