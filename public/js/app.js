$(function(){
    epStore.init();
});

var epStore = {

    home: {

        products: {

            eventHandler: function() {

                var _token = $('input[name="_token"]').val();

                $('.products').on('click', '.products__item', function(e){
                    e.preventDefault();

                    var self = this;

                    $.ajax({
                        url: '/cart',
                        method: "PUT",
                        headers: {
                            'X-CSRF-TOKEN': _token
                        },
                        data: {
                            id: $(self).attr('data-id')
                        }
                    })
                })
            },

            init: function() {
                this.eventHandler();
            }
        },

        init: function() {
            this.products.init();
        }
    },

    cart: {

        eventHandler: function() {

            var $cartList = $('.cart-list'),
                _token = $('input[name="_token"]').val()
            ;

            $cartList.on('click', '.cart-list__item .remove', function(e){
                e.preventDefault();

                var self = this;

                $.ajax({
                   url: '/cart',
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': _token
                    },
                    data: {
                        id: $(this).parents('.cart-list__item').attr('data-id')
                    }
                }).done(function(){

                    if($cartList.find('table tr').length > 2) {

                        $(self).parents('tr').remove();
                    }
                    else {

                        $cartList.remove();
                    }

                }).fail(function(){
                    console.log('fail');
                })
            })
        },

        init: function() {
            this.eventHandler();
        }
    },

    init: function() {
        this.home.init();
        this.cart.init();
    }
};
