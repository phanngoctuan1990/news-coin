$(function() {
    var filterData = { stage: 5 };

    var datatables = $('#coins-home').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: '/home/coin/datatables',
            data: function(d) {
                d.stage = filterData.stage;
            }
        },
        order: [[1, 'desc']],
        columns: [
            { data: 'thumbnail', name: 'thumbnail', orderable: false, searchable: false},
            { data: 'name', name: 'name' },
            { data: 'rate', name: 'rate' },
            { data: 'hype', name: 'hype' },
            { data: 'scam', name: 'scam' },
            { data: 'moom', name: 'moom' },
            { data: 'start_date', name: 'start_date' },
            { data: 'end_date', name: 'end_date' },
            { data: 'stage', name: 'stage' },
            { data: 'price', name: 'price' },
            { data: 'cate_name', name: 'cate_name', orderable: false, searchable: false }
        ],
        language: {
            url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json'
        },
        iDisplayLength: 50,
        bLengthChange: false,
        info: false,
        fnRowCallback: function( nRow, aData, iDisplayIndex ) {
            $(nRow).on('click', function(e) {
                document.location.href = "/coin/" + aData['slug'];
            })
        }
    });

  $(document).on('click', '.coin-filter', function(e) {
    filterData = { stage: $(this).attr('value') };
    datatables.draw();
    e.preventDefault();
  });

  $(document).ready(function() {
      $('.blog-content').find('img').addClass('img-responsive');
      // $('#news-image').removeClass('img-responsive');
  });
});
