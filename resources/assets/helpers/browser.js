var Browser = {
    setCookie(cname, cvalue, minutes = 1)
    {
        let d = new Date();
        d.setTime(d.getTime() + (minutes * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    },
    getCookie(cname)
    {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    },
    checkCookie(cname)
    {
        let username = Browser.getCookie(cname);
        return username ? 1 : 0;
    },
    getStorage(name)
    {
        return JSON.parse(localStorage.getItem(name)) || [];
    },
    setStorage(name, data = [])
    {
        localStorage.setItem(name, JSON.stringify(data));
    },
    delStorage(name)
    {
        localStorage.removeItem(name);
    }
};
// export var Storage = {
//     getStorage(name) {
//         return JSON.parse(localStorage.getItem(name)) || [];
//     },
//     setStorage(name, data = []) {
//         localStorage.setItem(name, JSON.stringify(data));
//     },
//     delStorage(name) {
//         localStorage.removeItem(name);
//     }
// };
export default Browser;
