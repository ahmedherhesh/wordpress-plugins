jQuery(document).ready(function($){
    let movie_sort_list = $('ul.movie-sort-list');
    let loading = $('.loading');
    let order_save_msg = $('.order-save-msg');
    let order_save_err = $('.order-save-err');

    movie_sort_list.sortable({
        update: function(e,ui){
            loading.show();
            $.ajax({

                url: ajaxurl,
                type: 'post',
                dataType: 'json',
                data :{
                    action: 'save_order',
                    order: movie_sort_list.sortable('toArray'),
                    // token: ML_MOVIE_LISTING.token
                },

                success:function(res){
                    loading.hide();
                    if(res.success == true){
                        order_save_msg.show();
                        order_save_msg.fadeOut(2000);
                    }else{
                        order_save_err.show();
                        order_save_err.fadeOut(2000);
                    }
                },

                error:function(err){
                    loading.hide();
                    order_save_err.show();
                    order_save_err.fadeOut(2000);
                }

            });

        }
    })
});