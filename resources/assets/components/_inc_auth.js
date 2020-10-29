import 'jquery-modal'
var Auth = {
    init : function ()
    {
        this.showPopupAuth()
        this.showPassword()
    },
    showPopupAuth()
    {
        $(".js-auth-popup").click(function (event){
            event.preventDefault()
            $('.js-popup-auth').modal({
                escapeClose: true,
                clickClose: true,
                showClose: true
            })
        })
    },

    showPassword()
    {
        $(".js-show-password i").click(function (event){
            event.preventDefault()
            let $this = $(this);
            let $elementPassword = $this.parent().prev()

            if($this.hasClass('fa-eye'))
            {
                $elementPassword.attr("type","text")
                $this.removeClass('fa-eye').addClass('fa-eye-slash')
            }else {
                $elementPassword.attr("type","password")
                $this.removeClass('fa-eye-slash').addClass('fa-eye')
            }
        })
    }
}

export default Auth
