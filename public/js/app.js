$(function(){
    epStore.init();
});

var epStore = {

    home: {

        products: {

            eventHandler: function() {

                var _token = $('input[name="_token"]').val();

                $('.products').on('click', '#addToCart', function(e){
                    e.preventDefault();

                    var self = this;

                    $.ajax({
                        url: '/cart',
                        method: "PUT",
                        headers: {
                            'X-CSRF-TOKEN': _token
                        },
                        data: {
                            id: $(self).parents('.products__item').attr('data-id')
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
            });

            $cartList.on('click', '#purchase', function(e){
                e.preventDefault();

                var products = {},
                    id,
                    quantity
                ;

                $.each($cartList.find('.cart-list__item'), function() {

                    id = $(this).attr('data-id');
                    quantity = $(this).find('select').val();
                    products[id] = quantity;
                });

                $.ajax({
                    url: 'user/purchase',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': _token
                    },
                    data: {
                        products: products
                    }
                }).done(function(){

                    window.location.replace('user/purchase');
                });
            })
        },

        init: function() {
            this.eventHandler();
        }
    },

    purchase: {

        eventHandler: function () {
            var _token = $('input[name="_token"]').val()

            $('#buy').on('click', function(e) {
                e.preventDefault();

                $.ajax({
                    url: 'purchase/buy',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': _token
                    }
                }).done(function(){

                    window.location.replace('purchase/success');
                });
            })
        },

        init: function() {
            this.eventHandler();
        }
    },

    init: function() {

        switch($('section').attr('data-section')) {
            case 'home':
                this.home.init();
                break;
            case 'cart':
                this.cart.init();
                break;
            case 'purchase':
                this.purchase.init();
                break;
        }

    }
};
