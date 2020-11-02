import Toastr from "toastr";

var Cart = {
    flagClick : false,
    init : function (){
        this.buyNow()
        this.addCart()
        this.processCartPay()
    },

    processCartPay()
    {
        let _this = this
        $(".js-save-cart").click(function (event){
            event.preventDefault()
            let $this = $(this)
            if (_this.flagClick === true) {
                return  false
            }
            $this.addClass('active')
            _this.flagClick = true

            let URL = $this.attr('data-url')
            if(URL)
            {
                let htmlOld = $this.html()
                $.ajax({
                    beforeSend: function( xhr ) {
                        $this.html(`<i class="fa fa-spinner fa-spin"></i> Đang xử lý`)
                    },
                    url: URL,
                    method : "POST",
                    data :  {
                        type : $("input[name='type_pay']:checked").val()
                    },
                    success:function(results){
                        _this.flagClick = false
                        $this.html(htmlOld)
                        $this.removeClass('active')
                        window.location.href = '/'
                    },
                    error: function(results){
                        $this.html(htmlOld)
                        $this.removeClass('active')
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
