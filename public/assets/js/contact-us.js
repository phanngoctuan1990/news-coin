$(function () {
    $('#contact-us').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '/admin/contact-us/datatables',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'subject', name: 'subject'},
            {data: 'created_at', name: 'created_at'},
            {data: 'replied', name: 'replied'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
        }
    });

    tinymce.init({
        selector: 'textarea',
        theme: 'modern',
        height: 320,
        plugins: [
            "code table"
        ],
        menubar: "format table tools",
    });
});