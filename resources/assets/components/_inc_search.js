import typeahead from "typeahead.js";
import Bloodhound from "bloodhound-js";

var SearchGuest = {
    init : function ()
    {
        this.searchUser()
        this.submitSearch()
    },
    searchUser()
    {
        let $element = $("#input_search")
        var bloodhound = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url: '/ajax/course/search?q=%QUERY%',
                wildcard: '%QUERY%'
            },
        });

        $element.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'users',
            source: bloodhound,
            display: function(data) {
                console.log(data)
                return data.name  //Input value to be set when you select a suggestion.
            },
            templates: {
                empty: [
                    '<div class="list-group search-results-dropdown">' +
                    '<div class="list-group-item">Không tồn tại dữ liệu.</div>' +
                    '</div>'
                ],
                header: [
                    '<div class="list-group search-results-dropdown">'
                ],
                suggestion: function(data) {
                    return '<div class="item">\n' +
                        '        <div class="item_info">\n' +
                        '            <a href="#" class="js-item-suggest-search" data-code="'+data.c_name+'">'+data.c_name+'</a>\n' +
                        '        </div>\n' +
                        '    </div>';
                }
            }
        });
    },

    submitSearch()
    {
        $("body").on("click",".js-item-suggest-search", function (event){
            let $this = $(this)
            let code = $this.attr('data-code')
            $("#input_search").val(code)
            $("#form-search-header").submit()
        })
    }
}

export default SearchGuest
