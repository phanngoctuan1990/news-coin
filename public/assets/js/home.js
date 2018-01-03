$(function () {

    var filterData = {stage: 5};

    var datatables = $('#coins-home').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: '/home/coin/datatables',
            data: function (d) {
                d.stage = filterData.stage;
            }
        },
        order: [[0, 'desc']],
        columns: [
            {data: 'name', name: 'name'},
            {data: 'rate', name: 'rate'},
            {data: 'hype', name: 'hype'},
            {data: 'scam', name: 'scam'},
            {data: 'moom', name: 'moom'},
            {data: 'start_date', name: 'start_date'},
            {data: 'end_date', name: 'end_date'},
            {data: 'stage', name: 'stage'},
            {data: 'price', name: 'price'},
            {data: 'cate_name', name: 'cate_name', orderable: false, searchable: false}
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
        },
        "iDisplayLength": 50,
        "bLengthChange": false,
        "info": false
    });

    $(document).on('click', '.coin-filter', function(e) {
        filterData = {stage: $(this).attr('value')};
        datatables.draw();
        e.preventDefault();
    });

    $(window).scroll(() => {
        const topOfcontact = $('#contact').position().top;
        const heightOfContact = $('#contact').outerHeight();
        switch (true) {
            case $(window).scrollTop() + heightOfContact > topOfcontact:
                $('.widget').removeClass('fixed-top');
                $('.widget').addClass('un-fixed');
                break;
            default:
                $('.widget').addClass('fixed-top');
                $('.widget').removeClass('un-fixed');
                break;
        }
    });
});
