// TODO chunk js/css files to files like cart.js cart.css and after compile and minify all to one file like build.js

// Cart
$('body').on('click', '.add-to-cart-link', function (e) {
    e.preventDefault();
    var id = $(this).data('id'),
        qty = $('.quantity input').val() ? $('.quantity input').val() : 1,
        mod = $('.available select').val();
    $.ajax({
        url: '/cart/add',
        data: {id: id, qty: qty, mod: mod},
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Error! Try later');
        }
    });
});

function showCart(cart) {
    console.log(cart);
}

// Currency change reload
$('#currency').change(function () {
    window.location = 'currency/change?curr=' + $(this).val();
});

// Single product options
$('.available select').on('change', function () {
    var modId = $(this).val(),
        color = $(this).find('option').filter(':selected').data('title'),
        price = $(this).find('option').filter(':selected').data('price'),
        basePrice = $('#base_price').data('base');
    if (price) {
        $('#base_price').text(symbolLeft + price + symbolRight);
    } else {
        $('#base_price').text(symbolLeft + basePrice + symbolRight);
    }
});


