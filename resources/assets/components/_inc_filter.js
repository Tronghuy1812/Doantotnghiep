var Filter = {
    init : function ()
    {
        this.changeSearch()
    },
    changeSearch()
    {
        let $select = $(".fill-search select")
        $select.change(function (){
            document.forms['form-search'].submit();
        })
    }
}

export default Filter
