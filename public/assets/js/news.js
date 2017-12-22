$(function () {
    $('#news').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '/admin/news/datatables',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'content', name: 'content'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
        }
    });
});
