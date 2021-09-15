
<script type="text/javascript">
	$(document).on('click','.view-product',function (){
		var product_info = $(this).attr('product-info');
		var category_info = $(this).attr('category-info');
        $.ajax({
            // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            url: "{{ route('product_quick_view') }}",
            data: {"_token": "{{ csrf_token() }}",product_info:product_info,category_info:category_info},
            success: function (data) {
                console.log(data.output);
            	$('.quick-view-div').html(data.output);
            	$('.quickview-wrapper').modal('show');
            },
            error: function (error) {
                // console.log(error);
            }
        });
	});

    $(document).on('click','.plus',function (){
        var index = $(this).attr('index');
        var class_name = '';
        if (index < 0) {
            class_name = '.qty';
        } else {
            class_name = '.cart_qty_'+index;
        }
        var qty = parseInt($(class_name).val());
        var qty = qty + 1;
        $(class_name).val(qty);

        if (index >= 0) {
            update_cart_item(index,qty);
        }
    });

    $(document).on('click','.minus',function (){
        var index = $(this).attr('index');
        var class_name = '';
        if (index < 0) {
            class_name = '.qty';
        } else {
            class_name = '.cart_qty_'+index;
        }
        var qty = parseInt($(class_name).val());
        if (qty > 1) {
            var qty = qty - 1;
        }
        $(class_name).val(qty);

        if (index >= 0) {
            update_cart_item(index,qty);
        }
    });

    $(document).on('click','.add_item_to_cart',function(){
        var cart_qty = $('.qty').val();
        var product_id = $(this).attr('product-id');
        $.ajax({
            type: "POST",
            url: "{{ route('add_item_to_cart') }}",
            data: {"_token": "{{ csrf_token() }}",cart_qty:cart_qty,product_id:product_id},
            success: function (data) {
                if (data.is_login == false) {
                    $('#login-modal').modal('show');
                } else {
                    if (data.is_cart_empty == false) {
                        $('.total-items').html(data.total_items);
                        $('#recently-added-item-div').html(data.recently_added_items);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Item Added To Cart.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Something Went Wrong.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            },
            error: function (error) {
                // console.log(error);
            }
        });
    });

    function update_cart_item(item_id,qty) {
        $.ajax({
            type: "POST",
            url: "{{ route('update_cart_item') }}",
            data: {"_token": "{{ csrf_token() }}",item_id:item_id,qty:qty},
            success: function (data) {
                if (data.is_login == false) {
                    $('#login-modal').modal('show');
                } else {
                    $('#cart-table-div').html(data.cart_table);
                    $('#shopping-bag-summary-div').html(data.shopping_bag_summary);
                    if (data.is_cart_empty == false) {
                        $('.total-items').html(data.total_items);
                        $('#recently-added-item-div').html(data.recently_added_items);
                    } else {
                        $('.total-items').html(0);
                        $('#recently-added-item-div').html('Your Cart Is Empty');
                    }
                }
            },
            error: function (error) {
                // console.log(error);
            }
        });
    }

    $(document).on('click','.remove_item_from_cart',function(){
        var item_id = $(this).attr('item-id');
        $.ajax({
            type: "POST",
            url: "{{ route('remove_item_from_cart') }}",
            data: {"_token": "{{ csrf_token() }}",item_id:item_id},
            success: function (data) {
                if (data.is_login == false) {
                    $('#login-modal').modal('show');
                } else {
                    $('#cart-table-div').html(data.cart_table);
                    $('#shopping-bag-summary-div').html(data.shopping_bag_summary);
                    if (data.is_cart_empty == false) {
                        $('.total-items').html(data.total_items);
                        $('#recently-added-item-div').html(data.recently_added_items);
                    } else {
                        $('.total-items').html(0);
                        $('#recently-added-item-div').html('Your Cart Is Empty');
                    }
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Item Removed From Cart.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            },
            error: function (error) {
                // console.log(error);
            }
        });
    });
</script>