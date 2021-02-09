import Browser from "../helpers/browser";
var MultipleChoice = {
    countTime: 120,
    startTime: 0,
    nameCookieChoice : '_start_choice',
    init: function () {
        this.startTimeChoice()
    },

    startTimeChoice() {
        let _this = this
        $(".js-process-choice").click(function (event) {
            event.preventDefault()
            let $this = $(this)
            if ($this.hasClass('btn-primary')) {
                $this.removeClass('btn-primary').addClass('btn-danger').text('Tạm dừng')
                _this.countDown()
            } else {
                clearTimeout(_this.startTime);
                $this.removeClass('btn-danger').addClass('btn-primary').text('Tiếp tục')
            }
        })
    },

    countDown() {
        let _this = this
        let $formSubmit = $("#myForm")
        let $timer = $("#timer")

        if ($timer.length) {
            if(Browser.checkCookie(_this.nameCookieChoice))
            {
                _this.countTime = Browser.getCookie(_this.nameCookieChoice)
            }else {
                Browser.setCookie(_this.nameCookieChoice,_this.countTime)
            }

            if (_this.countTime > 0) {
                _this.countTime--;
                Browser.setCookie(_this.nameCookieChoice,_this.countTime)
                console.log("countDown --" + _this.countTime)
                $timer.html(`<i class="fa fa-clock-o" aria-hidden="true"></i>  <b>${_this.secondsToHms(_this.countTime)}</b> giây `);

                _this.startTime = setTimeout(function () {
                    _this.countDown()
                }, 1000)

            } else {
                if ($formSubmit.length)
                {
                    $formSubmit.submit();
                    Browser.setCookie(_this.nameCookieChoice,null)
                }
            }
        }
    },

    secondsToHms(d) {
        d = Number(d);
        let h = Math.floor(d / 3600);
        let m = Math.floor(d % 3600 / 60);
        let s = Math.floor(d % 3600 % 60);

        let hDisplay = h > 0 ? h + (h === 1 ? " giờ - " : " giờ ") : "";
        let mDisplay = m > 0 ? m + (m === 1 ? " phút " : " phút ") : "";
        let sDisplay = s > 0 ? s + (s === 1 ? " giây " : " ") : "";

        return hDisplay + mDisplay + sDisplay;
    }
}

export default MultipleChoice
