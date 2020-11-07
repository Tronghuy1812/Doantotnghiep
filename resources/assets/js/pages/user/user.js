import 'jquery-pjax'
var PageUser = {
    init : function (){
        this.initPjax()
    },
    initPjax()
    {
        $(document).pjax('a[data-pjax]', '#pjax-pages')
        $(document).on('pjax:success', function(event, xhr, textStatus, errorThrown, options){
            // console.log($(this))
            // console.log(event)
            // $(event.target).addClass('active')
            console.log($.pjax)
        });
        $(document).on('beforeSubmit', 'form[data-pjax]', function(event) {
            $.pjax.submit(event, '#pjax-pages');
        });
    }
}

$(function (){
    PageUser.init()
})
