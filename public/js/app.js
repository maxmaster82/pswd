(function($){

    $('#removeConfirm').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var name = button.data('name');
        var modal = $(this);
        modal.find('.modal-body h2 span').text(name);
        modal.find('form').attr('action', button.data('route'));
    });

    $('.confirm-remove-btn').on('click', function(e){
        e.preventDefault();
        var $form = $(this).closest('form');
        $.ajax({
            url: $form.attr('action'),
            data: $form.serialize(),
            type: 'post',
            success: function(resonse){
                if(resonse.success === true)
                {
                    $('#removeConfirm').modal('hide');
                    location.reload();
                }
            }
        });
    });

    $('.password-field')
        .focusout(function(){$(this).attr('type', 'password')})
        .focusin(function(){$(this).attr('type', 'text')});

})(jQuery);
