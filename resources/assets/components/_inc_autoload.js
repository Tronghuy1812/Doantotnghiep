import Auth from './_inc_auth'
import RunMessage from './_inc_run_message'
var AutoloadJs = {
    init: function ()
    {
        Auth.init()
        RunMessage.init()
    }
}

export default AutoloadJs
