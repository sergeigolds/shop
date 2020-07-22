// TODO chunk js/css files to files like cart.js cart.css and after compile and minify all to one file like build.js

// Add to cart
$('body').on('click', '.add-to-cart-link', function (e) {
    e.preventDefault();
    let id = $(this).data('id'),
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

function clearCart() {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Error!');
        }
    });
}

// Remove single item from cart
$('#cart .modal-body').on('click', '.del-item', function () {
    let id = $(this).data('id');
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Error!');
        }
    });
});


function showCart(cart) {
    if ($.trim(cart) == '<h3>Cart is empty</h3>') {
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'none');
    } else {
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'inline-block');
    }
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
    if ($('.cart-sum').text()) {
        $('.simpleCart_total').html($('#cart .cart-sum').text());
    } else {
        $('.simpleCart_total').text('Empty Cart');
    }
}

function getCart() {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Error! Try later');
        }
    });
};


// Currency change reload
$('#currency').change(function () {
    window.location = 'currency/change?curr=' + $(this).val();
});

// Single product options
$('.available select').on('change', function () {
    let modId = $(this).val(),
        color = $(this).find('option').filter(':selected').data('title'),
        price = $(this).find('option').filter(':selected').data('price'),
        basePrice = $('#base_price').data('base');
    if (price) {
        $('#base_price').text(symbolLeft + price + symbolRight);
    } else {
        $('#base_price').text(symbolLeft + basePrice + symbolRight);
    }
});


// Search
let products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: path + '/search/result?query=%QUERY'
    }
});

products.initialize();

$("#typeahead").typeahead({
    // hint: false,
    highlight: true
}, {
    name: 'products',
    display: 'title',
    limit: 10,
    source: products
});

$('#typeahead').bind('typeahead:select', function (ev, suggestion) {
    // console.log(suggestion);
    window.location = path + '/search/?s=' + encodeURIComponent(suggestion.title);
});
