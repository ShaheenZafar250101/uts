<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS || Application Form</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="result_style.css">
  </head>
  <body style="background: #E6E6E6">
    <a class="whatsapp" id="whatsapp" href="#">
      <i class="fab fa-whatsapp"></i>
    </a>
    <div class="top-navbar bg-white" style="position: sticky;">
      <div class="container-xl row mr-auto ml-auto">
        <div class="col-sm-4">
          <div class="phone-contact d-flex">
            <div class="icon"><i class="fas fa-phone-square"></i></div>
            <div class="phone-numbers ml-3">
              Phone :
              <span class="phone-number"><a href="tel:051-111-258-369">051-111-258-369</a></span>,
              <span class="phone-number"><a href="tel:051-2152815">051-2152815</a></span>,
              <span class="phone-number"><a href="tel:051-2112240">051-2112240</a></span>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="social-contact w-25 ml-auto mr-auto d-flex">
            <div class="facebook" onclick="window.open('https://www.facebook.com/uts.com.pk/')">
              <i class="fab fa-facebook-f"></i>
            </div>
            <div class="twitter" onclick="window.open('https://twitter.com/UniversalTesti1?s=09')">
              <i class="fab fa-twitter"></i>
            </div>
            <div class="instagram" onclick="window.open('https://www.instagram.com/')">
              <i class="fab fa-instagram"></i>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="email-contact d-flex">
            <div class="icon"><i class="fas fa-envelope"></i></div>
            <div class="email-address ml-3">
              Email :
              <span class="email"><a href="mailto:info@uts.com.pk">info@uts.com.pk</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="lower-navbar" style="background: #014073;">
      <div class="container-xl ml-auto mr-auto">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="#"><img src="images/uts_logo.png" class="w-100" alt="uts-logo"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <div class="line line1"></div>
          <div class="line line2"></div>
          <div class="line line3"></div>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://uts.com.pk/about-us/">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://uts.com.pk/services/">Services</a>
              </li>
              <!--<li class="nav-item">-->
              <!--  <a class="nav-link" href="https://uts.com.pk/scholarship/">Scholarship</a>-->
              <!--</li>-->
              <li class="nav-item">
                <a class="nav-link" href="https://uts.com.pk/faqs/">FAQs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://uts.com.pk/contact/">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://uts.com.pk/uts/schedule.php">Schedule</a>
              </li>
            </ul>
            <!-- onclick="window.open('https://apply.uts.com.pk/online_registration.php','_self')" -->
             <div class="my-2 my-lg-0 nav-btn">
              <button
              class="btn btn-value my-2 my-sm-0"
              id="applynow"
              type="button"
              onclick="window.location.href='instructions.php'">
              Apply Now
              </button>
            </div> 
          </div>
        </nav>
      </div>
    </div>

    <script>
  // JavaScript code to handle navigation toggle
  document.addEventListener("DOMContentLoaded", function () {
    var navbarToggler = document.querySelector(".navbar-toggler");
    var navbarCollapse = document.querySelector(".navbar-collapse");

    navbarToggler.addEventListener("click", function () {
      navbarCollapse.classList.toggle("show");
    });
  });
</script>

</body>
</html>