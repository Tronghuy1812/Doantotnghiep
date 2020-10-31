var Course = {
    init : function ()
    {
        this.showContentCourse()
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
    }
}

$(function (){
    Course.init()
})
