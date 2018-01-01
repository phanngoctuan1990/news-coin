$(function() {
  $('#news').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: '/admin/news/datatables',
    columns: [
      { data: 'id', name: 'id' },
      { data: 'title', name: 'title' },
      {
        data: 'thumbnail',
        name: 'thumbnail',
        orderable: false,
        searchable: false
      },
      { data: 'content', name: 'content' },
      { data: 'created_at', name: 'created_at' },
      { data: 'action', name: 'action', orderable: false, searchable: false }
    ],
    language: {
      url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json'
    }
  });
});

$(function() {
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
      'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
  });
});

$(function() {
  $(window).scroll(() => {
    console.log($(window).scrollTop());
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
