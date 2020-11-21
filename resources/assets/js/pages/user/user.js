import 'jquery-pjax'
var PageUser = {
    init : function (){
        this.initPjax()
        this.vote()
    },
    initPjax()
    {
        $(document).pjax('a[data-pjax]', '#pjax-pages-page')
        $(document).on('pjax:success', function(data, status, xhr, options){
            console.log("pjax:success")
            let $this = $(data.relatedTarget)
            let element = $this.attr('data-class-element')
            $(element).removeClass('active')
            $this.addClass('active')
        });

        $(document).pjax('a[data-pjax-nav]', '#pjax-pages-page-tab')
    },
    vote()
    {
        // Hover icon thay đổi số sao dánh giá
        let $item = $("#ratings i");
        let arrTextRating = {
            1: "Không thích",
            2: "Tạm được",
            3: "Bình thường",
            4: "Rất tốt",
            5: "Tuyệt vời"
        }

        $item.mouseover(function () {
            let $this = $(this);
            let $i = $this.attr('data-i');
            $("#review_value").val($i);
            $item.removeClass('active');
            $item.each(function (key, value) {
                if (key + 1 <= $i) {
                    $(this).addClass('active')
                }
            })
            $("#reviews-text").text(arrTextRating[$i]);
        })

        $(".js-process-review").click(function (event) {
            event.preventDefault();

            let URL = $(this).parents('form').attr('action');
            $.ajax({
                url: URL,
                method: "POST",
                data: $('#form-review').serialize(),
            }).done(function (results) {
                $('#form-review')[0].reset();
                $(".js-review").trigger('click');
                if (results.html) {
                    $(".reviews_list .item").last().remove();
                    $(".reviews_list").prepend(results.html);
                }
                toast.success(results.messages);
            });
        })
    }
}

$(function (){
    PageUser.init()
})
