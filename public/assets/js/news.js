$(function () {
    $('#news').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/news/datatables',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'content', name: 'content'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
