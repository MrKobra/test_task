$(document).ready(function() {
    // Скрыть элемент
    $('.hidden_btn').on('click', function(e) {
        e.preventDefault();
        var btn = $(this);
        var id = btn.parents('ul').data('id');
        var msg = "Произошла ошибка";
        $.ajax({
            type: "POST",
            url: "./inc/hide_product.php",
            data: {
                id: id,
            },
            success: function(res) {
                if(res) {
                    btn.parents('ul').hide(500);
                    msg = "Элемент успешно скрыт";
                }
                $('.products .notice').addClass('show').text(msg);
            },
            error: function() {
                $('.products .notice').addClass('show').text(msg);
            }
        });
    })

    // Увеличение количества
    $('.products-quantity a').on('click', function(e){
        e.preventDefault();
        var count = $(this).parent().find('.quantity').data('quantity');
        var id = $(this).parents('ul').data('id');
        if ($(this).hasClass('plus')) {
            count++;
            $(this).parent().find('.quantity').data('quantity', count).text(count);
        } else if ($(this).hasClass('minus')) {
            count--;
            $(this).parent().find('.quantity').data('quantity', count).text(count);
        }
        $.ajax({
            type: "POST",
            url: "./inc/set_quantity_product.php",
            data: {
                count: count,
                id: id
            }
        })
    })
})