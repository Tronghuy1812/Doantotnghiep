import Toastr from 'toastr';
import Cart from "../../../components/_inc_cart";
import AutoloadJs from '../../../components/_inc_autoload'
var Course = {
    flagClick : false,
    init : function ()
    {
        this.showContentCourse()
        this.addFavourites()
        this.showPopupViewCourse()
        this.closeVideo()
    },

    showContentCourse()
    {
        $(".js-load-content-course").click(function (event){
            console.log("click")
            let $this = $(this)
            let $icon = $this.find(".icon i")
            $(this).find(".item-content").slideToggle()
            if($icon.hasClass('fa-chevron-down'))
            {
                $icon.removeClass('fa-chevron-down').addClass('fa-chevron-up')
            }else {
                $icon.addClass('fa-chevron-down').removeClass('fa-chevron-up')
            }
        })
    },

    showPopupViewCourse()
    {
        $(".js-view-course").click(function (event){
            event.preventDefault()

            let $this = $(this)
            let URL = $this.attr('href')
            $.ajax({
                beforeSend: function( xhr ) {
                    // $this.html(`<i class="fa fa-spinner fa-spin"></i> Đang xử lý`)
                },
                url: URL,
                method : "GET",
                success:function(results){
                    if(results.status === 404 || results.code === 401)
                    {
                        Toastr.warning(results.message)
                        return  false
                    }
                    $("#contentVideo").html(results.html)
                    $('#popup-view-course').modal({
                        escapeClose: false,
                        clickClose: false,
                        showClose: false
                    })
                },
                error: function(results){
                    console.log(results)
                }
            });
        })
    },

    closeVideo()
    {
        $(".js-close-video").click(function (event){
            event.preventDefault()
            $.modal.close();
            if(typeof $("body video")[0] !== 'undefined'){
                $("body video")[0].pause();
            }
        })
    },

    addFavourites()
    {
        let _this = this
        $(".js-save-favorite").click(function (event){
            event.preventDefault()
            let $this = $(this)
            if (_this.flagClick === true) {
                return  false
            }
            $this.addClass('active')
            _this.flagClick = true

            let URL = $this.attr('data-url')
            if (URL)
            {
                let htmlOld = $this.html()
                $.ajax({
                    beforeSend: function( xhr ) {
                        $this.html(`<i class="fa fa-spinner fa-spin"></i> Đang xử lý`)
                    },
                    url: URL,
                    method : "POST",
                    success:function(results){
                        _this.flagClick = false
                        $this.html(htmlOld)
                        $this.removeClass('active')
                        if(results.status === 200)
                        {
                            Toastr.success("Thêm yêu thích thành công")
                        }
                    },
                    error: function(results){
                        $this.html(htmlOld)
                        $this.removeClass('active')
                    }
                });
            }
        })
    }
}

$(function (){
    Course.init()
    Cart.init()
    AutoloadJs.init()
})
