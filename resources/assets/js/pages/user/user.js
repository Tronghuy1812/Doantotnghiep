import 'jquery-pjax'
var PageUser = {
    init : function (){
        this.initPjax()
    },
    initPjax()
    {
        $(document).pjax('a', '#pjax-pages')
    }
}

$(function (){
    PageUser.init()
})
