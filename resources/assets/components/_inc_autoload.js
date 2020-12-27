import 'jquery-modal'
import Auth from './_inc_auth'
import RunMessage from './_inc_run_message'
import Search from "./_inc_search";
var AutoloadJs = {
    init: function ()
    {
        console.log("init Autoload Js")
        Auth.init()
        RunMessage.init()
        Search.init()
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
