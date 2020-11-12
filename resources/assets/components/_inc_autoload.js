import 'jquery-modal'
import Auth from './_inc_auth'
import RunMessage from './_inc_run_message'
var AutoloadJs = {
    init: function ()
    {
        Auth.init()
        RunMessage.init()
        this.runToken()
        this.showMessage()
    },

    runToken()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    },

    showMessage()
    {
        $(".js-show-login").click(function (event){
            event.preventDefault()
            $('.js-popup-auth').modal({
                escapeClose: true,
                clickClose: true,
                showClose: true
            })
        })
    }
}

export default AutoloadJs
