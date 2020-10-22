import './../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js'
import './../../assets/plugins/ionicons/ionicons.js'
// import './../../assets/plugins/moment/moment.js'
import './../../assets/plugins/rating/jquery.rating-stars.js'
import './../../assets/plugins/rating/jquery.barrating.js'
import './../../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js'
// import './../../assets/plugins/perfect-scrollbar/p-scroll.js'
import './../../assets/plugins/jquery-sparkline/jquery.sparkline.min.js'
// import './../../assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js'
import './../../assets/plugins/sidebar/sidebar.js'
import './../../assets/plugins/sidebar/sidebar-custom.js'
// import './../../assets/js/eva-icons.min.js'
import './../../assets/js/sticky.js'
import './../../assets/js/custom.js'
import './../../assets/plugins/side-menu/sidemenu.js'
import './../../assets/switcher/js/switcher.js'

import FilepondUpload from '../components/_init_filepond.js'
import SEO from '../components/_inc_seo.js'
import Messages from "../../../components/_inc_run_message";

$(function (){
    FilepondUpload.inti()
    SEO.init()
    Messages.init()
})
