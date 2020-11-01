import 'owl.carousel'
import AutoloadJs from '../../../components/_inc_autoload'
var Home = {
    init : function ()
    {
        this.runBanner()
        this.runTags()
        this.runCourse()
        this.showCourseByCategory()
    },

    runBanner()
    {
        $('.js-banner').owlCarousel({
            animateOut: 'slideOutDown',
            animateIn: 'flipInX',
            items:1,
            navigation: true,
            smartSpeed:450,
            navText: ["<i class='fa fa-chevron-left '></i>","<i class='fa fa-chevron-right'></i>"]
        })
    },

    runTags()
    {
        $('.js-tags').owlCarousel({
            animateOut: 'slideOutDown',
            animateIn: 'flipInX',
            items:7,
            navigation: true,
            smartSpeed:450,
            navText: ["<i class='fa fa-chevron-left '></i>","<i class='fa fa-chevron-right'></i>"]
        })
    },

    runCourse()
    {
        $(".js-lists-course-home").owlCarousel({
            items:4,
            loop:true,
            nav: true,
            navigation: true,
            smartSpeed:450,
            navText: ["<i class='fa fa-chevron-left '></i>","<i class='fa fa-chevron-right'></i>"]
        })
        $(".js-tags-home").owlCarousel({
            animateOut: 'slideOutDown',
            animateIn: 'flipInX',
            items:6,
            loop:false,
            nav: false,
            dots: false,
            smartSpeed:450,
            navText: ["<i class='fa fa-chevron-left '></i>","<i class='fa fa-chevron-right'></i>"]
        })

        $(".js-lists-lecture").owlCarousel({
            animateOut: 'slideOutDown',
            animateIn: 'flipInX',
            items:3,
            loop:false,
            nav: false,
            dots: false,
            smartSpeed:450,
            navText: ["<i class='fa fa-chevron-left '></i>","<i class='fa fa-chevron-right'></i>"]
        })
    },

    showCourseByCategory()
    {
        $(".js-course-by-category").click(function (event){
            event.preventDefault()
            $(".js-course-by-category").removeClass('active')
            let $this = $(this);
            $this.addClass('active')
            let URL = $this.attr('href')
            if (URL) {
                $.ajax({
                    url: URL,
                    beforeSend: function( xhr ) {
                        $(".js-loading-1").show()
                    }
                }).done(function( results ) {
                    console.log(results)
                    if (results.coursesHtml)
                    {
                        $("#coursesHtml").html(results.coursesHtml)
                    }
                });
            }
        })
    }
}

$(function (){
    AutoloadJs.init()
    Home.init()
})
