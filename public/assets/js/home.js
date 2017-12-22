$(function () {
    $('#coins-home').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '/home/coin/datatables',
        columns: [
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
            {data: 'cate_name', name: 'cate_name'}
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
        }
    });
});
