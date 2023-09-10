    // alert('hi');
    console.log("login redirect");
    function getApiData(data, ajaxurl) {
        console.log(data);
        return $.ajax({
            url: ajaxurl,
            data: data,
            type: 'POST',
        });
    }
    
    $('.lastLogUrlCheck').click(function(){
        var data = {_token: $('meta[name="csrf-token"]').attr('content')};
        console.log(data);
       lastUrlRedirect(data);
    });
    
    async function lastUrlRedirect(data) {
        var data = await getApiData(data, '/last-url-check');
       if(data){
           location.href = '/login';
       }
    }
    
    $('.clickCheckout').click(function(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/check-logged-or-not',
            data:{'flag':1},
            cache: false,
            processData: false,
            contentType: false, 
            type: 'POST',
            success: function(response){
                console.log(response);
                if(response == 1){
                    location.href = '/checkout';
                }else{
                    location.href = '/checkout';
                }
            },
            error: function(error){
                location.reload();
            }
        })
    });
    
    $('.submit_order_form').click(function(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/check-logged-or-not',
            data:{'flag':1},
            cache: false,
            processData: false,
            contentType: false, 
            type: 'POST',
            success: function(response){
                if(response == 0){
                    //if not logged in
                    location.href = '/login';
                }
            },
            error: function(error){
                location.reload();
            }
        })
    });