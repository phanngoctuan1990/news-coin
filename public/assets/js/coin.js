$(function () {
    $('#coins').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/coin/datatables',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'thumbnail', name: 'thumbnail', orderable: false, searchable: false},
            {data: 'rate', name: 'rate'},
            {data: 'hype', name: 'hype'},
            {data: 'scam', name: 'scam'},
            {data: 'moom', name: 'moom'},
            {data: 'start_date', name: 'start_date'},
            {data: 'end_date', name: 'end_date'},
            {data: 'stage', name: 'stage'},
            {data: 'price', name: 'price'},
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
                        window.location.href = 'admin/coin';
                    }
                }
            });
        }
    });
});