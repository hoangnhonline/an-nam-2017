$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.cate-filter').change(function() {
        $('#searchForm').submit();
    });
    $('.color-filter').click(function() {
        if($(this).hasClass('active')){
            $(this).next().val('');    
        }else{
            $(this).next().val($(this).data('id'));
        }        
        $('#searchForm').submit();
    });
    $('a.sort').click(function() {
        $('#sort-filter').val($(this).data('sort'));
        $('#searchForm').submit();
    });
    $('img.lazy').lazyload();
});
$(document).ready(function() {
    $('.cart-link').click(function() {
        $.ajax({
            url: $('#route-short-cart').val(),
            method: "GET",

            success: function(data) {
                $('#short-cart-content').html(data);
                $('#scart_popup').modal('show');
                calTotalProduct();
            }
        });
    });

    $('.btn-checkout').click(function() {
        $('form#shopping-cart').submit();
    });


    $(document).on('change', '.change_quantity', function() {
        var quantity = $(this).val();
        var id = $(this).data('id');
        update_product_quantity(id, quantity, 'ajax');
    });
    $(document).on('change', '.change_quantity_payment', function() {
        var quantity = $(this).val();
        var id = $(this).data('id');
        update_product_quantity(id, quantity, 'normal');
    });


    $(document).on('click', '.del_item', function() {
        var id = $(this).data('id');
        $(this).parents('.tr-wrap').remove();
        update_product_quantity(id, 0, 'ajax');
    });
    $(document).on('click', '.del_item_list', function() {
        var id = $(this).data('id');
        $(this).parents('.tr-wrap').remove();
        update_product_quantity(id, 0, 'list');
    });

    $(document).on('click', '.keep-buying', function() {
        $('#scart_popup').modal('hide');
    });

});



function add_product_to_cart(product_id) {
    $.ajax({
        url: $('#route-add-to-cart').val(),
        method: "POST",
        data: {
            id: product_id
        },
        success: function(data) {
            $('.cart-link').click();
        }
    });
}

function calTotalProduct() {
    var total = 0;
    $('.change_quantity ').each(function() {
        total += parseInt($(this).val());
    });
    $('.order_total_quantity').html(total);
}

function update_product_quantity(id, quantity, type) {
    $.ajax({
        url: $('#route-update-product').val(),
        method: "POST",
        data: {
            id: id,
            quantity: quantity
        },
        success: function(data) {
            $.ajax({
                url: $('#route-short-cart').val(),
                method: "GET",

                success: function(data) {
                    if (type == 'ajax') {
                        $('#short-cart-content').html(data);
                        calTotalProduct();
                    } else {
                        window.location.reload();
                    }
                }
            });
        }
    });
}

$(document).on('keypress', '#txtSearch', function(e) {
    var obj = $(this);
    if (e.which == 13) {
        if ($.trim(obj.val()) == '') {
            return false;
        }
    }
});