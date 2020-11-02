import Auth from './_inc_auth'
import RunMessage from './_inc_run_message'
var AutoloadJs = {
    init: function ()
    {
        Auth.init()
        RunMessage.init()
        this.runToken()
    },

    runToken()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }
}

export default AutoloadJs
