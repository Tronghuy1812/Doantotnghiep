import 'owl.carousel'
var Home = {
    init : function ()
    {
        console.log("init home")
        this.runBanner()
        this.runTags()
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
    }
}

$(function (){
    Home.init()
})
