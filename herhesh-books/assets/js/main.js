jQuery(document).ready(function ($) {
    let star = $('.star');
    star.on('mouseenter', function () {
        let data_val = $(this).data('value');
        for (let i = data_val; i < star.length; i++) {
            star[i].style.color = '#000';
        }
        for (let i = 0; i < data_val; i++) {
            star[i].style.color = 'orange';
        }
        stars_value.value = data_val
    })

})


