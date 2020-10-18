import 'owl.carousel'
var Home = {
    init : function ()
    {
        this.runBanner()
        this.runTags()
        this.runCourse()
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
            items:5,
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
    }
}

$(function (){
    Home.init()
})
