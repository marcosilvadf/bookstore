<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Swiper demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <link
    rel="stylesheet"
    href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    />
    <style>
    body {
      background: #fff;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
      margin: 0;
      padding: 0;
    }

    .swiper {
      width: 100%;
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 300px;
      height: 300px;

    }
  </style>
</head>

<body>
  <!-- Swiper -->
  <div class="swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide" style="background-image:url(/image/livrosCapas/628a82acd0217.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(/image/livrosCapas/628a82acd0217.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(/image/livrosCapas/628a82acd0217.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(/image/livrosCapas/628a82acd0217.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(./images/nature-5.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(./images/nature-6.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(./images/nature-7.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(./images/nature-8.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(./images/nature-9.jpg)"></div>
      <div class="swiper-slide" style="background-image:url(./images/nature-10.jpg)"></div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>



  <!-- Initialize Swiper -->
  <script type="module">
    import Swiper from 'https://unpkg.com/swiper@8/swiper-bundle.min.js';
    import 'https://unpkg.com/swiper@8/swiper-bundle.min.css';
    var swiper = new Swiper('.swiper', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>

  <!-- Demo styles -->
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
</body>

</html>