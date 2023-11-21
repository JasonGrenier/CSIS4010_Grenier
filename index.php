<?php
include('global.php');
$salonID = 4;
$servicesQuery = "SELECT ServiceID, SalonID, ServiceName, Description, Price 
                  FROM Service 
                  WHERE SalonID = $salonID";

$result = $connection->query($servicesQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>K & M Beauty Lounge</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/kmbeauty.png" rel="icon">
  <link href="assets/img/kmbeauty.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>


<body>
  <!-- ======= Intro Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <a href="index.html" class="hero-logo" data-aos="zoom-in"><img src="assets/img/kmbeauty.png" alt=""></a>
      <h1 data-aos="zoom-in">Welcome To K & M Beauty Lounge</h1>
      <h2 data-aos="fade-up">We are here to help you look and feel your best.</h2>
      <a data-aos="fade-up" data-aos-delay="200" href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href="index.html"><img src="assets/img/kmbeauty.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
          <li class="dropdown"><a href="#"><span>Schedule</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="book.php?stylist=Kerri">Kerri</a></li>
              <li><a href="book.php?stylist=Mel">Mel</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>About Us</h2>
          <p>Get to know your stylists!</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <div class="image">
              <img src="assets/img/about.jpg" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-lg-6" data-aos="fade-left">
  <div class="content pt-4 pt-lg-0 pl-0 pl-lg-3 ">
    <h3>Kerri &amp; Mel - Your Experienced Stylists</h3>
    <p class="fst-italic">
      With over a decade of combined expertise, Kerri, a skilled hairstylist, and Mel, a talented nail artist, are thrilled to welcome you to our new salon.
    </p>
    <ul>
      <li><i class="bx bx-check-double"></i> Kerri and Mel both have more than 10 years of experience in their respective fields.</li>
      <li><i class="bx bx-check-double"></i> They previously collaborated at Kontempo Kutz, a salon owned by Kerri.</li>
      <li><i class="bx bx-check-double"></i> Now, as co-owners of this new salon, they're excited to bring their expertise together to provide top-notch services.</li>
    </ul>
    <p>
      Kerri and Mel invite you to experience their exceptional skills and dedication. Their passion for their craft ensures you'll receive the best care and artistry during your visit. Come join us and let Kerri and Mel transform your style with their unparalleled talents!
    </p>
  </div>
</div>


      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Services</h2>
          <p>View our selection of premier services.</p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1">
            <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up">
              <i class="bi bi-scissors"></i>
              <h4>Cut</h4>
              <p>Enjoy a new hairstyle, or a subtle trim.</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="100">
              <i class="bi bi-palette"></i>
              <h4>Color</h4>
              <p>Have a color in mind? Need a recommendation? We can do it all!</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-droplet-half"></i>
              <h4>Manicures & Pedicures</h4>
              <p>Whether you're going on vacation or just want to treat yourself, we got you covered.</p>
            </div>
          </div>
          <div class="image col-lg-6 order-1 order-lg-2" style='background-image: url("assets/img/services.jpg");' data-aos="fade-left" data-aos-delay="100"></div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Featured Section ======= -->
<section id="featured" class="featured">
  <div class="container">

    <div class="row">
      <div class="col-lg-6" data-aos="fade-right">
        <div class="tab-content">
          <div class="tab-pane active show" id="tab-1">
            <figure>
  <p>Transform your look with our professional hair cutting service. Our skilled stylists stay updated with the latest trends to provide precision cuts that suit your unique style. Whether you're looking for a bold change or a subtle trim, we'll customize the cut to enhance your features and complement your personality. Step into our salon and experience a relaxing atmosphere while our experts work their magic to give you a hairstyle that stands out.</p>

            </figure>
          </div>
          <div class="tab-pane" id="tab-2">
            <figure>
  <p>Add vibrancy to your hair with our expert hair coloring service. Whether you desire a bold fashion color, subtle highlights, or a complete color transformation, our skilled colorists use top-quality products to achieve stunning and long-lasting results. From classic shades to trendy hues, we offer a spectrum of options to match your style and preferences. Step into our salon, consult with our color experts, and let us bring your hair color dreams to life with precision and care.</p>
            </figure>
          </div>
          <div class="tab-pane" id="tab-3">
            <figure>
  <p>Indulge in a luxurious manicure experience at our salon. Our skilled technicians will pamper your hands, shaping and polishing your nails to perfection. Choose from a variety of nail colors and designs, or opt for a classic French manicure. We use high-quality products and pay attention to detail to ensure your nails look impeccable. Relax in our comfortable setting as we enhance the beauty of your hands, leaving you with well-groomed and polished nails that make a lasting impression.</p>

            </figure>
          </div>
          <div class="tab-pane" id="tab-4">
            <figure>
              <p>Treat your feet to the ultimate care with our professional pedicure service. Our experienced technicians will rejuvenate your feet, providing expert nail care and exfoliation. Choose from a range of relaxing foot soaks and massage options to enhance your pedicure experience. We focus on hygiene and use quality products to ensure your feet not only look beautiful but feel revitalized. Step into our salon, unwind in a soothing atmosphere, and let us take care of your feet, leaving them soft, smooth, and ready to conquer the world.</p>

            </figure>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-left">
        <ul class="nav nav-tabs flex-column">
          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
              <h4>Hair Cutting</h4>
              <p>Professional hair cutting service for a stylish look.</p>
            </a>
          </li>
          <li class="nav-item mt-2">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
              <h4>Hair Coloring</h4>
              <p>Add a pop of color to your hair with our expert color service.</p>
            </a>
          </li>
          <li class="nav-item mt-2">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
              <h4>Manicure</h4>
              <p>Pamper your hands with our professional manicure service.</p>
            </a>
          </li>
          <li class="nav-item mt-2">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
              <h4>Pedicure</h4>
              <p>Give your feet the care they deserve with our pedicure service.</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

  </div>
</section><!-- End Featured Section -->
<br /><br />

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-7 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-stretch">

            <div class="content" data-aos="fade-up">
              <h3>Why we are your <strong>number one choice</strong></h3>
              <p>
                For over 20 years, we have had experience working in the beauty industry. Our clients have come back time and time again, speaking highly of the services we provide for them. Throughout the years our clientele has grown so much that our reputation began to speak for itself. 
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li data-aos="fade-up" data-aos-delay="100">
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Why choose our salon for your next makeover? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                      Our team of skilled stylists stays ahead of the curve, continuously trained in the latest trends and techniques. We're not just hairstylists; we're trendsetters committed to bringing you the freshest and most fashionable looks.
                    </p>
                  </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="200">
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> What sets our salon apart in understanding your unique needs? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      At our salon, we believe in the power of personalization. Our consultations go beyond discussing preferences; we take the time to understand your lifestyle, personality, and desired outcome. This ensures a customized experience tailored just for you.
                    </p>
                  </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="300">
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Why should you indulge in our salon's services? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Step into an atmosphere of luxury and sophistication. We use only premium, salon-exclusive products to pamper your hair and skin. From the moment you enter, you'll be treated to an unparalleled experience that goes beyond just a haircut or styling session.
                    </p>
                  </div>
                </li>

              </ul>
            </div>

          </div>

          <div class="col-lg-5 order-1 order-lg-2 align-items-stretch video-box" style='background-image: url("assets/img/why-us.jpg");' data-aos="zoom-in">
            
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Portfolio</h2>
          <p>Explore some of our showcased works and creations as well as our favorite products.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-hair">Hair</li>
              <li data-filter=".filter-nails">Nails</li>
              <li data-filter=".filter-makeup">Makeup</li>
              <li data-filter=".filter-product">Product</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        
        <div class="col-lg-4 col-md-6 portfolio-item filter-nails">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/nails1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Nails 1</h4>
                <p></p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-product">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 2</h4>
                <p></p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-hair">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/hair2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Hair 2</h4>
                <p></p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-product">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 3</h4>
                <p></p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-makeup">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Makeup 1</h4>
                <p></p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-hair">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/hair3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Hair 3</h4>
                <p></p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-product">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 4</h4>
                <p></p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-hair">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/hair1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Hair 3</h4>
                <p></p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
          

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
  <div class="container" data-aos="zoom-in">
    <div class="quote-icon">
      <i class="bx bxs-quote-right"></i>
    </div>

    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <div class="testimonial-item">
            <p>
              I couldn't be happier with the service I received. The stylists here are true professionals. My hair has never looked better!
            </p>
            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="Saul Goodman">
            <h3>Saul Goodman</h3>
            <h4>Happy Customer</h4>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <p>
              The attention to detail and creativity in the design was outstanding. I love my new look, and it's all thanks to the talented team at this salon.
            </p>
            <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="Sara Wilsson">
            <h3>Sara Wilsson</h3>
            <h4>Satisfied Customer</h4>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <p>
              This salon is my go-to for all things beauty. The staff is friendly, the atmosphere is welcoming, and the results are consistently impressive. Highly recommended!
            </p>
            <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="Jena Karlis">
            <h3>Jena Karlis</h3>
            <h4>Loyal Customer</h4>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <p>
              The expertise of the stylists is unmatched. I appreciate the attention they give to understanding my preferences, resulting in a hairstyle that perfectly suits me.
            </p>
            <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="Matt Brandon">
            <h3>Matt Brandon</h3>
            <h4>Delighted Customer</h4>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <p>
              Outstanding service from start to finish. The salon's commitment to quality and customer satisfaction is evident in every visit. I won't go anywhere else!
            </p>
            <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="John Larson">
            <h3>John Larson</h3>
            <h4>Grateful Customer</h4>
          </div>
        </div><!-- End testimonial item -->

      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section><!-- End Testimonials Section -->


    

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Team</h2>
          <p>Meet our amazing team of trained stylists.</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="zoom-in">
              <div class="member-img">
                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href="https://www.facebook.com/k.m.beautylounge411"><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Kerri</h4>
                <span>Master Stylist</span>
                <p>Kerri, with her expert touch and creative flair, specializes in hair transformations. Her dedication to staying abreast of the latest trends ensures that every client leaves the salon not just satisfied, but thrilled with their refreshed look.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="member-img">
                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href="https://www.facebook.com/k.m.beautylounge411"><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Mel</h4>
                <span>Nail Art Extraordinaire</span>
                <p>Mel, a skilled nail technician, turns nails into works of art. Her precision and attention to detail make each manicure or pedicure a personalized masterpiece. Whether you're looking for a classic design or something bold and trendy, Mel has the expertise to make your nails stand out.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing section-bg">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Services</h2>
      <p>Discover our basic salon services to pamper yourself</p>
    </div>

    <div class="row">
      <?php 
      
	      if ($result) {
	      	$services = $result->fetch_all(MYSQLI_ASSOC);
	    	foreach ($services as $service) {
	    	echo '<div class="col-lg-4 col-md-6 mt-4 mt-lg-0" style="padding: 10px">';
	    	echo "<div class='box' data-aos='zoom-in' data-aos-delay='100'>";
	      	$serviceName = $service['ServiceName'];
	      	echo "<h3>" . "$serviceName". "</h3>";
	      	$cost = $service['Price'];
	      	echo '<h4><sup>$</sup>' . $cost . '<span> / session</span></h4>';
	      	echo "<ul>";
	      	$description = $service['Description'];
	      	echo "<li> " . $description . "</li>";
	      	echo "</ul>";
	      	$book = "book.php";
	        echo "<div class='btn-wrap'><a href='$book' class='btn-buy'>Book Now</a></div>";
	        echo "</div>";
	        echo "</div>";
		    }
		  } else {
			    echo "Error executing query: " . $connection->error;
		}
		  $connection->close();     
	  ?>
      
      
        
          
          
       
          

    </div>

  </div>
</section>
<!-- End Pricing Section -->


    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Frequently Asked Questions</h2>
        </div>

        <ul class="faq-list">

          <li data-aos="fade-up">
            <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq1">How far in advance can I cancel an appointment?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
                You should cancel an appointment at least 24 hours in advance.
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="100">
            <a data-bs-toggle="collapse" data-bs-target="#faq2" class="collapsed">My hair is damaged, can I still dye it?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
              <p>
                Yes, we work with any and all hair conditions. If it is damaged, we can provide you with the correct treatment to ensure no further damage is done, and leave you feeling fabulous.
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="200">
            <a data-bs-toggle="collapse" data-bs-target="#faq3" class="collapsed">Should I wash my hair before a color treatment?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>
                Yes. A cleaner set of hair removes any possible build up allowing products bind to the hair providing a better performance.
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="400">
            <a data-bs-toggle="collapse" data-bs-target="#faq5" class="collapsed">Any other questions? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
              <p>
                Please call us at 774-306-4001, and we will be more than happy to connect with you.
              </p>
            </div>
          </li>
        </ul>
      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Have a question? Contact us!</p>
        </div>

        <div class="row">
            <div class="info d-flex flex-column justify-content-center" data-aos="fade-right">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>365 East Washington St.,<br>North Attleboro, MA 02760</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>k.m.beautylounge411@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 774 - 306 - 4001</p>
              </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">

      <div class="container">

        <div class="row justify-content-center">
          <div class="col-lg-6">
            <a href="#header" class="scrollto footer-logo"><img src="assets/img/kmbeauty-small.png" alt=""></a>
            <h3>K & M Beauty Lounge</h3>
            <p>Stay in contact with us!</p>
          </div>
        </div>

       

        <div class="social-links">
          <a href="https://www.facebook.com/k.m.beautylounge411" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="https://instagram.com/k.m.beautylounge?igshid=OGQ5ZDc2ODk2ZA==" class="instagram"><i class="bx bxl-instagram"></i></a>
        </div>

      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>K & M Beauty Lounge</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Built by <a target=”_blank” href="https://linkedin.com/in/jason-grenier?">Grenier Software</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
