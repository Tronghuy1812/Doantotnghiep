import Cart from "../../../components/_inc_cart";
import AutoloadJs from '../../../components/_inc_autoload'
var Course = {
    flagClick : false,
    init : function ()
    {
        this.showContentCourse()
        this.addFavourites()
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
