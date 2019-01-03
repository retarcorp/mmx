/* global wc_add_to_cart_params */
$(function ($) {

    let AddToCartHandler = function () {
        $(document.body)
            .on('click', '.cart-button', this.onAddToCart)
            .on('change', '.position__cart-options input[type=number]', this.addingToCart);

        let id = $('.position__cart-options').find('input[type=hidden]').val();

        let arrayIds = JSON.parse(window.localStorage.getItem('cartId'));
        updateHeader(arrayIds, id);
    };

    AddToCartHandler.prototype.onAddToCart = function (e) {
        e.preventDefault();
        let $that = $(this).parent();
        let id = $that.find('input[type=hidden]').val();
        let price = $that.find('.price').text() * 1;
        if (isNaN(price)) {
            price = $('.position__cart-options').find('.price span').text() * 1;
        }

        setCount(id, price);
    };

    AddToCartHandler.prototype.addingToCart = function (e) {
        e.preventDefault();
        let count = $('.position__cart-options').find('input[type=number]').val() * 1;

        let id = $('.position__cart-options').find('input[type=hidden]').val();

        let price = $('.position__cart-options').find('.price span').text() * 1;

        setCount(id, price, count)

    };

    new AddToCartHandler();

    $('body').on('click', '#cart', function (e) {
        e.preventDefault();
        let arrayIds = JSON.parse(window.localStorage.getItem('cartId'));
        let form = $('#cartForm');

        arrayIds.forEach(function (index, value) {
            if (index !== null) {
                form.find('.form-group').append('<input type="hidden" name="Products[id][' + value + ']" value="' + index + '">');
            }
        });

        form.submit();
    });

    $('#orderForm').submit(function (event) {

        event.preventDefault();

        window.localStorage.removeItem('cartId');
        window.localStorage.removeItem('cartPrice');
        $(this).unbind('submit').submit();

    });

    $('body').on('click', '.clear-cart', function () {
        $(this).addClass('hidden');
        window.localStorage.removeItem('cartId');
        window.localStorage.removeItem('cartPrice');

        $('.header__cart-items').find('.count span').text('0');
        $('.header__cart-items').find('.price').text('0.00 руб')
    })

});

function setPrice(id, ids, price) {
    let priceArray = JSON.parse(window.localStorage.getItem('cartPrice'));

    if (priceArray === null) {
        priceArray = [];
    }

    if (priceArray[id] === null || priceArray[id] === undefined) {
        priceArray[id] = price;
    }

    window.localStorage.setItem('cartPrice', JSON.stringify(priceArray));
}

function setCount(id, price, count) {

    let arrayIds = JSON.parse(window.localStorage.getItem('cartId'));

    if (arrayIds === null) {
        arrayIds = [];
    }

    if (arrayIds.length === 0 && count === undefined) {
        count = 1;
    } else {
        if (id in arrayIds && count === undefined) {
            if (arrayIds[id] === 0) {
                count = 1
            } else {
                count = arrayIds[id] + 1
            }
        } else {
            count = 1;
        }
    }

    arrayIds[id] = count;

    window.localStorage.setItem('cartId', JSON.stringify(arrayIds));


    setPrice(id, arrayIds, price);
    updateHeader(arrayIds, id);
}

function updateHeader(array, id) {

    let count = 0;
    let price = 0.00;

    let priceArray = JSON.parse(window.localStorage.getItem('cartPrice'));

    if (priceArray !== null) {
        priceArray.forEach(function (index, value) {
            if (index !== null) {
                price += index * array[value]
            }
        });
    }

    if (array !== null) {
        array.forEach(function (value) {
            count += value;
        });
    }
    if (array !== null) {
        $('.clear-cart').removeClass('hidden');
        $('.position__cart-options').find('input[type=number]').val(array[id]);
    }


    $('.header__cart-items').find('.count span').text(count);
    if (price === 0) {
        $('.header__cart-items').find('.price').text('0.00 руб.');
    } else {
        $('.header__cart-items').find('.price').text(price + ' руб.');
    }
}

