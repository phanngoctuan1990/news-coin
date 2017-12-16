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
$(function () {
    $(document).on('click', '[data-method="delete"]', function () {
        var action = $(this).attr('href');
        if (confirm('Bạn có chắc chắn muốn xoá?')) {
            $.ajax({
                type: "DELETE",
                url: action,
                success: function (result) {
                    if (result.success) {
                        window.location.href = 'admin/news';
                    }
                }
            });
        }
    });
});