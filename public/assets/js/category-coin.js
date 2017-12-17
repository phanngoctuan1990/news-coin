$(function () {
    $('#category-coins').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/category-coin/datatables',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
