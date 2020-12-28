import 'jquery-modal'
import {login_google} from "../helpers/function";
var Auth = {
    init : function ()
    {
        this.showPopupAuth()
        this.showPassword()
        this.changeFormAuth()
        this.register()
        this.login()
        this.handleLoginGoogle()
    },

    handleLoginGoogle()
    {
        let login = login_google('js_login_google');
        console.log(login)
        login.done(function (data)
        {
            $.ajax({
                url: URL_SOCIAL,
                method : "POST",
                data:data,
                success: function(results) {
                    console.log(results)
                    if(results.code === 200)
                    {
                        location.reload();
                    }
                },
                error: function(xhr) {

                },
            });

            console.log(data,'data true')
        });
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

    changeFormAuth()
    {
        $("body").on("click",".js-render-form", function (event){
            event.preventDefault()
            let $this = $(this)
            let type = $this.attr('data-type')
            if(type === 'login')
            {
                $this.attr("data-type","register").text("Đăng ký")
            }else {
                $this.attr("data-type","login").text("Đăng nhập")
            }
            $(".auth-form").hide()
            $(".auth-form[data-type='"+type+"']").show()
        });
    },

    register()
    {
        $("body").on("click",".js-register", function(event){
            let URL = $("#formRegister").attr('action')
            event.preventDefault()
            $(".gd-danger").remove()
            $.ajax({
                url: URL,
                method : "POST",
                data:$('#formRegister').serialize(),
                success: function(results) {
                    if(results.code === 200)
                    {
                        location.reload();
                    }
                },
                error: function(xhr) {
                    $('#validation-errors').html('');
                    $.each(xhr.responseJSON.errors,function(field_name,error){
                        $("#formRegister").find('[name='+field_name+']').after('<span class="text-strong gd-danger">' +error+ '</span>')
                    })
                },
            });
        })
    },

    login()
    {
        $("body").on("click",".js-login", function(event){
            let URL = $("#formLogin").attr('action')
            event.preventDefault()
            $(".gd-danger").remove()
            $.ajax({
                url: URL,
                method : "POST",
                data:$('#formLogin').serialize(),
                success: function(results) {
                    if(results.code === 200)
                    {
                        location.reload();
                    }
                },
                error: function(xhr) {
                    $('#validation-errors').html('');
                    $.each(xhr.responseJSON.errors,function(field_name,error){
                        $("#formLogin").find('[name='+field_name+']').after('<span class="text-strong gd-danger">' +error+ '</span>')
                    })
                },
            });
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
