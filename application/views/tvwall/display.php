<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-control" content="no-cache">
  <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/favicon.ico">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/modal.css">
  <title><?= $title; ?></title>
</head>

<body>
  <section>
    <span class="overlay"></span>
    <input type="hidden" id="ip_address" value="<?= $_SERVER['REMOTE_ADDR']; ?>">
    <div id="container">
      <div id="news">
        <img src="<?= base_url(); ?>assets/img/logo.png" alt="" id="logo">
        <!-- <p id="address">Jl. HR. Rasuna Said Kav. 3-4 Kuningan, Setiabudi Jakarta Selatan</p> -->
        <h1 id="title" class="animate-news"></h1>
        <p id="description" class="animate-news"></p>
        <p id="scan">Scan untuk berita lengkap</p>
        <img src="" alt="" id="qrcode" class="animate-news">
        <img src="<?= base_url(); ?>assets/img/pattern.png" alt="" id="pattern">
        <img src="<?= base_url(); ?>assets/img/pattern1.png" alt="" id="pattern1">
        <img src="<?= base_url(); ?>assets/img/pattern1.png" alt="" id="pattern1-2">
        <img src="<?= base_url(); ?>assets/img/pattern1.png" alt="" id="pattern1-3">
        <img src="<?= base_url(); ?>assets/img/pattern2.png" alt="" id="pattern2">
        <div id="info-media">
          <img src="<?= base_url(); ?>assets/img/socials.png" alt="" id="socials">
          <img src="<?= base_url(); ?>assets/img/phone.png" alt="" id="phone">
          <img src="<?= base_url(); ?>assets/img/website.png" alt="" id="website">
          <img src="<?= base_url(); ?>assets/img/email.png" alt="" id="email">
        </div>
      </div>
      <div id="video">
        <video controls autoplay id="videosource"></video>
      </div>
      <div id="slider"></div>
      <div id="footer">
        <marquee>
          <p id="running-text"></p>
        </marquee>
        <div class="datetime">
          <p id="date"></p>
          <p id="time"></p>
        </div>
      </div>
    </div>
    <div class="modal-box">
      <img alt="" id="imgapp">
    </div>
  </section>
  <script>
    const BASE_URL = "<?= base_url(); ?>";
  </script>
  <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
  <?php
  $rd = rand();
  ?>
  <script src="<?= base_url(); ?>assets/js/script.js?v=<?= $rd; ?>"></script>
</body>

</html>