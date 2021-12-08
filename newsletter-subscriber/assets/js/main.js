jQuery(document).ready(function ($) {
    let subscriber_form = $('#subscriber-form');
    let form_msg = $('#form-msg');
    subscriber_form.submit(function (e) {
        e.preventDefault();
        let subscriber_data = subscriber_form.serialize();

        $.ajax({
            type: 'post',
            url: subscriber_form.attr('action'),
            data: subscriber_data
        }).done(function (response) {
            form_msg.removeClass('error');
            form_msg.addClass('success');
            form_msg.text(response);
            $('#name').val('');
            $('#email').val('');
        }).fail(function (data) {
            form_msg.removeClass('success');
            form_msg.addClass('error');
            if(data.responseText !== ''){
                form_msg.text(data.responseText);
            }else{
                form_msg.text('Message Was Not Sent');
            }
        });
    });
});