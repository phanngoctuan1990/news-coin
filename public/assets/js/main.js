
$(function () {
    $(document).on('click', '[data-method="delete"]', function (e) {
        var dataConfirm = $(this).attr('data-confirm');
        var token = $('meta[name="csrf-token"]').attr('content');
        var action = $(this).attr('href');
        bootbox.confirm({
            message: dataConfirm,
            buttons: {
                'cancel': {
                    label: "Thoát",
                    className: "btn-default",
                },
                'confirm': {
                    label: "Xoá",
                    className: "btn-danger",
                }
            },
            callback: function (result) {
                if (result) {
                    var form =
                        $('<form>', {
                            'method': 'POST',
                            'action': action
                        });
                    var tokenInput =
                        $('<input>', {
                            'type': 'hidden',
                            'name': '_token',
                            'value': token
                        });
                    var hiddenInput =
                        $('<input>', {
                            'name': '_method',
                            'type': 'hidden',
                            'value': 'DELETE'
                        });
                    form.append(tokenInput, hiddenInput).hide().appendTo('body').submit();
                }
            },
        });
        return false;
    });
});
