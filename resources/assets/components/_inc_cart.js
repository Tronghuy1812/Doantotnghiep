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
        let _this = this
        $(".js-buy-now").click(function (event){
            event.preventDefault()
            let $this = $(this)
            let URL = $this.attr('data-url')
            if(typeof URL !== "undefined")
            {
                let result = _this.processAddCart(URL, $this)
                console.log(result,'result')
                result.done(function (results){
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
                        window.location.href = URL_PAY
                    }
                })
            }
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
                let result = _this.processAddCart(URL, $this)
                result.done(function (results){
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
                        let $count = $("#countSource")
                        let numberCount = $count.text()
                        $count.text(parseInt($count.text()) + 1)
                    }
                })
            }
        })
    },

    processAddCart(URL, $element)
    {
        // let results = $.ajax({
        //     url: URL,
        //     success:function(results){
        //         console.log(results)
        //         if(results.status === 401)
        //         {
        //             $('.js-popup-auth').modal({
        //                 escapeClose: true,
        //                 clickClose: true,
        //                 showClose: true
        //             })
        //             return  false
        //         }
        //         if(results.status === 404)
        //         {
        //             console.log('404')
        //             Toastr.error('Dữ liệu không tồn tại')
        //             return  false
        //         }
        //
        //         if(results.status === 200)
        //         {
        //             console.log('404')
        //             Toastr.success(results.message)
        //         }
        //     },
        //     error: function(results){
        //
        //     }
        // });

        let results = $.ajax({
            url: URL,
            async : false
        });

        return results
    }
}

export default Cart
