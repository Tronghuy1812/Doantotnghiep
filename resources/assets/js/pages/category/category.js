var Category = {
    init : function ()
    {
        this.changeSearch()
    },

    changeSearch()
    {
        let $select = $(".fill-search select")
        $select.change(function (){
            // $("#form-search").submit();
            document.forms['form-search'].submit();
            // document.forms['myFormName'].submit();
        })
    }
}

$(function (){
    Category.init()
})
