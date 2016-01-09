$(function(){
    epStore.init();
});

var epStore = {

    home: {

        products: {

            eventHandler: function() {

                $('.products').on('click', '.products__item', function(e){
                    e.preventDefault();

                    var self = this;

                    $.ajax({
                        url: '/cart',
                        method: "PUT",
                        headers: {
                            'X-CSRF-TOKEN': $(self).find('input[name="_token"]').val()
                        },
                        dataType: 'json',
                        data: {
                            id: $(this).attr('data-id')
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

            var $cartList = $('.cart-list');

            $cartList.on('click', '.cart-list__item .remove', function(e){
                e.preventDefault();
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
