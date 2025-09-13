function updateQuantity(type, id){
    $.ajax({
        url: 'cart/' + type + '/' + id,
        method: 'POST',
        dataType: 'json',
        headers:{
            'X-CSRF-Token' : $('#csrf_token').attr('content')
        },
        data:{
            'product_id': id
        },
        success:function (data){
            if (data.status){
                console.log(data)
                $('#total_amount').fadeOut(200, function (){
                    $(this).text(data.total_amount).fadeIn(200)
                });
                $('#product_price-' + id).fadeOut(200, function (){
                    $(this).text(data.product_price).fadeIn(200)
                });
                $('#amount_payable').fadeOut(200, function (){
                    $(this).text(data.amount_payable).fadeIn(200)
                });
                $('#profit').fadeOut(200, function (){
                    $(this).text(data.profit).fadeIn(200)
                });
                $('#quantity-' + id).text(data.quantity);
                if (data.quantity == 1){
                    $('#iconQyt').attr('class', 'text-danger fas fa-trash-alt')
                }else {
                    $('#iconQyt').attr('class', 'text-danger fas fa-minus')
                }
                if (data.quantity == 0){
                    console.log('yeah')
                    location.reload();
                }
            }
        },
        error:function (error){

        }
    })

}

function ChangeCities(){
    let province_id = $('#province').val()
    $.ajax({
        url: 'http://127.0.0.1:8000/profile/showProfileAddresses/cities',
        method: 'POST',
        dataType: 'json',
        headers: {
        'X-CSRF-Token': $('#csrf_token').attr('content')
        },
        data: {
            province_id
        },
        success:function (data){
            $('#city').html(data.cities)
        },
        error:function (error){
            console.log('have an error')
        }
    })
}
