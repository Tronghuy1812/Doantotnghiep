import Toastr from "toastr";

var Cart = {
    init : function (){
        this.buyNow()
        this.addCart()
        this.processCartPay()
    },

    processCartPay()
    {
        console.log('111')
        $(".js-save-cart").click(function (event){
            event.preventDefault()
            let $this = $(this)
            let URL = $this.attr('data-url')
            if(URL)
            {
                $.ajax({
                    url: URL,
                    method : "POST",
                    data :  {
                        type : $("input[name='type_pay']:checked").val()
                    },
                    success:function(results){
                        console.log(results)
                    },
                    error: function(results){

                    }
                });
            }
        })
    },

    buyNow()
    {
        $(".js-buy-now").click(function (event){
            event.preventDefault()
            let $this = $(this)
            console.log($this)
        })
    },

    addCart()
    {
        let _this = this
        $(".js-add-cart").click(function (event){
            event.preventDefault()
            let $this = $(this)
            let URL = $this.attr('data-url')
            if(typeof URL !== "undefined")
            {
                _this.processAddCart(URL, $this)
            }
            console.log(URL)
        })
    },

    processAddCart(URL, $element)
    {
        $.ajax({
            url: URL,
            success:function(results){
                console.log(results)
                if(results.status === 401)
                {
                    $('.js-popup-auth').modal({
                        escapeClose: true,
                        clickClose: true,
                        showClose: true
                    })
                    return  false
                }
                if(results.status === 404)
                {
                    console.log('404')
                    Toastr.error('Dữ liệu không tồn tại')
                    return  false
                }

                if(results.status === 200)
                {
                    console.log('404')
                    Toastr.success(results.message)
                }
            },
            error: function(results){

            }
        });
    }
}

export default Cart
