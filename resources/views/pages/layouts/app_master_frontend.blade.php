<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
        {!! SEO::generate() !!}
        <link rel="icon" href="{{ asset('img/brand/favicon.png') }}" type="image/x-icon"/>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
        <meta name="google-signin-client_id" content="264409137001-t3k59t8fsgsie5pqag2to9emp9cion5i.apps.googleusercontent.com">
        @yield('style')
    </head>
    <body>
        @include('pages.components.header._inc_header_dt')
        @include('pages.components.header._inc_header_mb')
        @yield('content')
        @include('pages.components._inc_footer')
        @if(!get_data_user('web'))
            @include('pages.components.auth._inc_popup_auth')
        @endif
    </body>
    @yield('script')

    <script>
        // Render Google Sign-in button
        function renderButton() {
            gapi.signin2.render('gSignIn', {
                'scope': 'profile email',
                'width': 240,
                'height': 50,
                'longtitle': true,
                'theme': 'dark',
                'onsuccess': onSuccess,
                'onfailure': onFailure
            });
        }

        // Sign-in success callback
        function onSuccess(googleUser) {
            // Get the Google profile data (basic)
            //var profile = googleUser.getBasicProfile();

            // Retrieve the Google account data
            gapi.client.load('oauth2', 'v2', function () {
                var request = gapi.client.oauth2.userinfo.get({
                    'userId': 'me'
                });
                request.execute(function (resp) {
                    // Display the user details
                    var profileHTML = '<h3>Welcome '+resp.given_name+'! <a href="javascript:void(0);" onclick="signOut();">Sign out</a></h3>';
                    profileHTML += '<img src="'+resp.picture+'"/><p><b>Google ID: </b>'+resp.id+'</p><p><b>Name: </b>'+resp.name+'</p><p><b>Email: </b>'+resp.email+'</p><p><b>Gender: </b>'+resp.gender+'</p><p><b>Locale: </b>'+resp.locale+'</p><p><b>Google Profile:</b> <a target="_blank" href="'+resp.link+'">click to view profile</a></p>';
                    document.getElementsByClassName("userContent")[0].innerHTML = profileHTML;

                    document.getElementById("gSignIn").style.display = "none";
                    document.getElementsByClassName("userContent")[0].style.display = "block";
                });
            });
        }

        // Sign-in failure callback
        function onFailure(error) {
            alert(error);
        }

        // Sign out the user
        function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
                document.getElementsByClassName("userContent")[0].innerHTML = '';
                document.getElementsByClassName("userContent")[0].style.display = "none";
                document.getElementById("gSignIn").style.display = "block";
            });

            auth2.disconnect();
        }
    </script>
</html>
