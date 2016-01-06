$(function(){
    epStore.init();
});

var epStore = {

    home: {

        products: {

            eventHandler: function() {
                $('.products').on('click', '.products__item', function(e){
                    e.preventDefault();

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

                var productId = $(this).parents('.cart-list__item').attr('data-id');
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
