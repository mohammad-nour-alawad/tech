</div>

<footer class="footer" style="margin-top: 80px;">
    <div class="footer_container">
        <div class="footer-left">
            <div class="logo">
                <a href="<?php echo URL; ?>">
                    <p><span>T</span>ech</p>
                </a>
            </div>
            <p class="footer-links">
                <a href="<?php echo URL; ?>" class="link-1">Home</a>
                <a href="<?php echo URL; ?>info/about">About</a>
                <a href="<?php echo URL; ?>info/contact">Contact</a>
                <a href="<?php echo URL; ?>courses">Courses</a>
                <a href="<?php echo URL; ?>login/">Sign-in</a>
                <a href="<?php echo URL; ?>register/">Sign-up</a>
            </p>
            <p class="footer-company-name">Tech Inc. © 2021</p>
        </div>
        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span> HIAST, MOSBA2 ALSOUN3 </span> Damascus , Syria</p>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p>+963 912-345-678</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="www.gmail.com">TECH@gmail.com</a></p>
            </div>
        </div>
        <div class="footer-right">
            <p class="footer-company-about">
                <span>About TECH</span>
                Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus
                vehicula sit amet.
            </p>
            <div class="footer-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-github"></i></a>
            </div>
        </div>
    </div>
</footer>
<script src="<?php echo URL; ?>public/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo URL; ?>public/bootstrap-3.4.1-dist/js/bootstrap.min.js"></script>
<script src="<?php echo URL; ?>public/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URL; ?>public/DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo URL; ?>public/js/homepage.js"></script>
<script src="<?php echo URL; ?>public/js/login.js"></script>
<script src="<?php echo URL; ?>public/js/register.js"></script>
<script src="<?php echo URL; ?>public/js/subject.js"></script>
<script src="<?php echo URL; ?>public/js/functions.js"></script>
<script src="<?php echo URL; ?>public/js/push.js-1.0.11/bin/push.js"></script>


<script>
$(document).ready(() => {
    $('#usertable').DataTable();
});
</script>


<?php if(isset($_SESSION['user']) && $_SESSION['user']->role != "admin") { ?>
<script>
    var noti_cnt = 0;
	$(document).ready(function () {
		$('.noti-button').click(function(){
                    $.ajax({
                    url: "<?php echo URL;?>notification/setNotificationsSeen/<?php echo $_SESSION['user']->id; ?>",
                    method: "get",            
                    dataType: "json",
                    success: function(response) {
                        var single = response.notifications;
                        p = single.length;

                        single.forEach(element => {
                            if (noti_cnt == 0 || element.seen == 0) {
                                var li = document.createElement("li");
                                var img = document.createElement("img");
                                img.src = "<?php echo URL;?>public/profile-pics/"+element.img_url;
                                img.classList.toggle("sender-img");

                                var span1 = document.createElement("span");
                                span1.innerHTML = element.header;
                                span1.classList.toggle("notification-header");

                                var span2 = document.createElement("span");
                                span2.innerHTML = element.send_date;
                                span2.classList.toggle("notification-send-date");
                                li.append(img);
                                li.append(span1);
                                li.append(document.createElement("br"));
                                li.innerHTML += element.f_name + " " + element.l_name + " " + element.body + " '" +
                                    element.subject_name + "' ";
                                li.append(document.createElement("br"));
                                li.append(span2);
                                var menu = document.querySelectorAll(".notification-menu");
                                if(element.seen==0){
                                    li.classList.add("new-notification-distinct");
                                }
                                menu[0].insertBefore(li , menu[0].firstChild);
                                li.append(document.createElement("br"));
                                li.append(document.createElement("br"));
                            }
                        });
                        noti_cnt = 1;
                    },
                    error: function(msg) {}
                    });
        });
	});

var deskNotiCnt = 0;

$(document).ready(function() {
    setInterval(getNotifications, 3000);
});

function getNotifications() {
    $.ajax({
        url: "<?php echo URL;?>notification/getNotifications",
        method: "GET",
        dataType: "json",
        success: function(response) {
            var single = response.notifications;
            p = single.length;
            if (p != 0) {
                if( deskNotiCnt < p ){
                    deskNotiCnt = p;
                    Push.create("TECH",{
                        body: "You have " + deskNotiCnt + " new notifications !!",
                        icon: '<?php echo URL;?>public/icons/logo.png',
                        timeout: 10000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
                }
                $('.notification-container .counter .count').html(p);
                $('.notification-container .counter').css("display", "block");

                $('.counter2 .count2').html(p);
                $('.counter2').css("display", "block");
            } else {
                deskNotiCnt = 0;
                $('.notification-container .counter .count').html(p);
                $('.notification-container .counter ').css("display", "none");
                $('.counter2 .count2').html(p);
                $('.counter2').css("display", "none");
            }
        },
        error: function(msg) {}
    });
}
</script>
<?php } ?>
</body>

</html>