<?php

include "header.php";
include "navbar.php";
include "navbar-mobile.php";

?>

<!-- Page content -->
<div class="content" style="max-width:2000px;margin-top:46px">

    <!-- The Info Section -->
    <div class="container content center padding-64" style="max-width:800px" id="band">

        <div class="logo"><img src="images/logo.png" width="400px"></div>
        <h2 class="wide">Latin Patriarchate Schools</h2>
        <p class="opacity"><i>Palestine</i></p>
        <p class="justify">We have created a school website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur
            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>

    <!-- Events & Activities Section -->
    <div class="black" id="tour">
        <div class="container content padding-64" style="max-width:800px">
            <h2 class="wide center">Events & Activities</h2>
            <p class="opacity center"><i>The awesome stuff that we do!</i></p><br>

            <ul class="ul border white text-grey">
                <li class="padding">March <span class="badge red margin-right">9</span></li>
                <li class="padding">April <span class="badge red margin-right">4</span></li>
                <li class="padding">May <span class="badge right margin-right">3</span></li>
            </ul>

            <div class="row-padding padding-32" style="margin:0 -16px">
                <div class="third margin-bottom">
                    <img src="images/meeting.jpg" alt="Parent Teacher Meeting" style="width:100%" class="hover-opacity">
                    <div class="container white">
                        <p><b>Parent Teacher Meeting</b></p>
                        <p class="opacity">Fri 18 May 2018</p>
                        <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                    </div>
                </div>
                <div class="third margin-bottom">
                    <img src="images/meeting.jpg" alt="Parent Teacher Meeting" style="width:100%" class="hover-opacity">
                    <div class="container white">
                        <p><b>Parent Teacher Meeting</b></p>
                        <p class="opacity">Sat 19 May 2018</p>
                        <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                    </div>
                </div>
                <div class="third margin-bottom">
                    <img src="images/meeting.jpg" alt="Parent Teacher Meeting" style="width:100%" class="hover-opacity">
                    <div class="container white">
                        <p><b>Parent Teacher Meeting</b></p>
                        <p class="opacity">Sun 20 May 2018</p>
                        <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Google Maps -->
    <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Birzeit&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
        <style>.mapouter{overflow:hidden;height:500px;width:100%;}.gmap_canvas {background:none!important;height:500px;width:100%;}</style></div>


    <!-- The Contact Section -->
    <div class="container content padding-64" style="max-width:800px" id="contact">
        <h2 class="wide center">CONTACT US</h2>
        <p class="opacity center"><i>Let us reach out to you!</i></p>
        <div class="row padding-32">
            <div class="col m6 large margin-bottom">
                <i class="fa fa-map-marker" style="width:30px"></i> Latin Patriarchate School, Birzeit<br>
                <i class="fa fa-phone" style="width:30px"></i> Phone: +970 2-9172620<br>
                <i class="fa fa-envelope" style="width:30px"> </i> Email: mail@latin-schools.com<br>
            </div>
            <div class="col m6">
                <form action="" target="_blank">
                    <div class="row-padding" style="margin:0 -16px 8px -16px">
                        <div class="half">
                            <input class="input border" type="text" placeholder="Name" required name="Name">
                        </div>
                        <div class="half">
                            <input class="input border" type="text" placeholder="Email" required name="Email">
                        </div>
                    </div>
                    <input class="input border" type="text" placeholder="Message" required name="Message">
                    <button class="button black section right" type="submit">SEND</button>
                </form>
            </div>
        </div>
    </div>

    <!-- End Page Content -->
</div>


<?php
include "footer.php";
?>
