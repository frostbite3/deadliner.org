<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php wp_head(); ?>
<link href="<?php bloginfo("template_directory");?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="<?php bloginfo("template_directory");?>/js/jquery.min.js"></script>
<script src="<?php bloginfo("template_directory");?>/js/common.js"></script>
</head>
<body>
 <div id="wptime-plugin-preloader"></div>
 <style>
  @font-face {
   font-family:Adam;
    src: url("<?php bloginfo("template_directory");?>/fonts/font_1.eot");
    src: url("<?php bloginfo("template_directory");?>/fonts/font_1.eot?#iefix")format("embedded-opentype"),
         url("<?php bloginfo("template_directory");?>/fonts/font_1.woff") format("woff"),
         url("<?php bloginfo("template_directory");?>/fonts/font_1.ttf") format("truetype");
    font-style: normal;
    font-weight: normal;
   }
  @font-face {
   font-family:Airbone;
    src: url("<?php bloginfo("template_directory");?>/fonts/font_2.eot");
    src: url("<?php bloginfo("template_directory");?>/fonts/font_2.eot?#iefix")format("embedded-opentype"),
         url("<?php bloginfo("template_directory");?>/fonts/font_2.woff") format("woff"),
         url("<?php bloginfo("template_directory");?>/fonts/font_2.ttf") format("truetype");
    font-style: normal;
    font-weight: normal;
   }
  @font-face {
   font-family:Open Sans;
    src: url("<?php bloginfo("template_directory");?>/fonts/font_3.eot");
    src: url("<?php bloginfo("template_directory");?>/fonts/font_3.eot?#iefix")format("embedded-opentype"),
         url("<?php bloginfo("template_directory");?>/fonts/font_3.woff") format("woff"),
         url("<?php bloginfo("template_directory");?>/fonts/font_3.ttf") format("truetype");
    font-style: normal;
    font-weight: normal;
   }
 </style>
 <script type="text/javascript">
  $(document).ready(function()
  {
   $("#menu").on("click","a", function (event) 
   {
    event.preventDefault();
    var id  = $(this).attr('href'),
    top = $(id).offset().top;
    $('body,html').animate({scrollTop: top}, 1000);
   });

   $('.our-services').click(function () {
    selOption = this.id;
    switch (selOption)
    {
       case "viz": document.getElementById('caser').options[1].selected=true; break;
       case "land": document.getElementById('caser').options[2].selected=true; break;
       case "korp": document.getElementById('caser').options[3].selected=true; break;
       case "magz": document.getElementById('caser').options[4].selected=true; break;
    }
    location.href = "#zakaz";
   });

  });
 </script>
 <script type="text/javascript">
  $(document).ready(function()
  {
   $(".hr-scroll").on("click","a", function (event) 
   {
    event.preventDefault();
    var id  = $(this).attr('href'),
    top = $(id).offset().top;
    $('body,html').animate({scrollTop: top}, 1000);
   });
  });
  </script>
  <div class="dm-overlay" id="zakaz">
   <div class="dm-table">
    <div class="dm-cell">
     <div class="dm-modal">
      <a href="#close" class="close"></a>
      <h3>Заполните контактную форму и мы с вами свяжемся</h3>
      В контактной форме просьба указывать ваш действующий аккаунт E-mail, телефонный номер Viber либо же Аккаунт Skype.
      <p><HR WIDTH="75%" SIZE="3" color="#0f1725"></p>
      <form id="form_1" method="post">
       <input type="text" name="fio" placeholder="Введите ваше Ф.И.О." required><br> 
       <input type="text" name="connection" placeholder="Введите ваш E-mail, Skype или Viber" required><br>
       <select id= "caser" name="ch">
        <option disabled selected>Выберите тип проекта</option>
        <option value="Сайт-визитка">Сайт-визитка</option>
        <option value="Лендинг-пейдж">Лендинг-пейдж</option>
        <option value="Корпоративный сайт">Корпоративный сайт</option>
        <option value="Интернет магазин">Интернет магазин</option>
        <option value="Иной тип разрабатываемых сайтов">Иной тип разрабатываемых сайтов</option>
       </select> 
       <button>Отправить</button><br>
      </form>
     </div>
    </div>
   </div>
  </div>
  <div class="dm-overlay" id="sendwell">
   <div class="dm-table">
    <div class="dm-cell">
     <div class="dm-modal">
      <a href="#close" class="close"></a>
      <h3>Спасибо за заявку! В ближайшее время мы с вами свяжемся.</h3>
     </div>
    </div>
   </div>
  </div>
 <div class="page-align">
  <div class="top-line">
  	<div class="site-name" onClick="location.href = 'http://www.deadliner.org'">
    <img src="<?php bloginfo("template_directory");?>/design/logotype.png">
  	 deadliner.org
  	 <div class="site-description">Разработка адаптивных сайтов под ключ</div>
  	</div>
    <span class="menu-burger" onClick="menu_show();">≡</span>
    <div id="menu" class="menu-block">
     <ul class="hover-effect-1">
      <li><a href="#our-services">НАШИ УСЛУГИ</a></li>
      <li><a href="#about">О НАШЕЙ ОРГАНИЗАЦИИ</a></li>
      <li><a href="#contacts">КОНТАКТЫ</a></li>
     </ul>
    </div>
    <div class="recall-button"><a href="#zakaz" class="recall-button-effect outline-inward">ЗАКАЗАТЬ<br>ОБРАТНЫЙ ЗВОНОК</a></div>
  </div>
 <script>
  $(document).ready(function()
  {
   var searcher = document.getElementById("menu").getElementsByTagName('ul');
   if ($(window).width()<="768") 
    searcher[0].style.display="none";
  });
 </script>
  <script>
   var searcher = document.getElementById("menu").getElementsByTagName('ul');
   $(window).resize(function()
   {
    if ($(window).width()<="768") 
     searcher[0].style.display="none";
    else
     searcher[0].style.display="block";
   });
  </script>
  <script>
   function menu_show()
   {
    var finder = document.getElementById("menu").getElementsByTagName('ul');
    if (finder[0].style.display == "none")
      finder[0].style.display = "block";
    else 
      finder[0].style.display = "none";
   }
  </script>
  <script type="text/javascript">
   $(document).ready(function()
   {
    var x1 = $("div.top-line").outerHeight();
    $(".fw-page-builder-content").css("margin-top", x1);
    $(window).resize(function()
    {
     var x2 = $("div.top-line").outerHeight();
     $(".fw-page-builder-content").css("margin-top", x2);
    });
   });
  </script>