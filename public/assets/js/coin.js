$(function () {
    $('#coins').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
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
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
        }
    });

    tinymce.init({
        selector: '.textarea',
        theme: 'modern',
        height: 320,
        plugins: [
          'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
          'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
          'save table contextmenu directionality emoticons template paste textcolor'
        ],
        content_css: 'css/content.css',
        toolbar:
          'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
    });
});
