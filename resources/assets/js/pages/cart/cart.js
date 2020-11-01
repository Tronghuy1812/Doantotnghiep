import AutoloadJs from '../../../components/_inc_autoload'
var CartPage = {
    init : function ()
    {
        this.changePayType()
    },

    changePayType()
    {
        $(".js-pay-type").click(function (event){
            let $this = $(this)
            let valueType = $this.find('b').text()
            $(".js-pay-type-preview").text(valueType)
        })
    },
}

$(function (){
    CartPage.init()
    AutoloadJs.init()
})
