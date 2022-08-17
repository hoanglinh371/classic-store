$(document).ready(function () {
    $('#add-product-form').submit(function (e) {
        // e.preventDefault();
        $.ajax({
            url: '/admin/insert_product_process.php',
            type: 'POST',
            dataType: 'JSON',
            data: $(this).serializeArray(),
        });
    });

    $('#edit-product-form').submit(function (e) {
        // e.preventDefault();
        $.ajax({
            url: '/admin/edit_product_process.php',
            type: 'POST',
            dataType: 'JSON',
            data: $(this).serializeArray(),
        });
    })

    $('#delete-product-form').submit(function (e) {
        // e.preventDefault();
        $.ajax({
            url: '/admin/delete_product_process.php',
            type: 'POST',
            dataType: 'JSON',
            data: $(this).serializeArray(),
        });
    })

    $(document).on('click', '#edit-product-button', function () {
        const id = $(this).attr('data-id');
        $.ajax({
            url: './get_data.php',
            method: 'POST',
            data: {id: id},
            dataType: 'JSON',
            success: function (data) {
                $('input[name="product_id"]').val(data.id);
                $('input[name="product_name"]').val(data.name);
                $('input[name="product_category_id"]').val(data.directory_id);
                $('input[name="product_image_url"]').val(data.image_url);
                $('input[name="product_price"]').val(data.price);
            }
        });
    })

    $(document).on('click', '#delete-product-button', function () {
        const id = $(this).attr('data-id');
        $.ajax({
            url: './get_data.php',
            method: 'POST',
            data: {id: id},
            dataType: 'JSON',
            success: function (data) {
                $('input[name="product_id"]').val(data.id);
            }
        });
    })

    $('.header__cart-icon').click(function () {
        $('.header__cart-dropdown').toggleClass('show');
    });
})