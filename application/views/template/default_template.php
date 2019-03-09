<!DOCTYPE html>
<html>
<?php echo $page["head"]; ?>
<style type="text/css">
<?php if(isset($css)){ echo $css; } ?> 
</style>
<style type="text/css">
    #preloader {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #fff;
      /* change if the mask should have another color then white */
      z-index: 99;
      /* makes sure it stays on top */
    }

    #status {
      width: 200px;
      height: 200px;
      position: absolute;
      left: 50%;
      /* centers the loading animation horizontally one the screen */
      top: 50%;
      /* centers the loading animation vertically one the screen */
      background-image: url(https://raw.githubusercontent.com/niklausgerber/PreLoadMe/master/img/status.gif);
      /* path to your loading animation */
      background-repeat: no-repeat;
      background-position: center;
      margin: -100px 0 0 -100px;
      /* is width and height divided by two */
    }
    .load-bar {
      position: relative;
      width: 100%;
      height: 6px;
      background-color: #fff;
    }
    .bar {
      content: "";
      display: inline;
      position: absolute;
          left: 50%;
          /* centers the loading animation horizontally one the screen */
          top: 50%;
      width: 0;
      height: 100%;
      left: 50%;
      text-align: center;
    }
    .bar:nth-child(1) {
      background-color: #1d8cf8;
      animation: loading 3.5s linear infinite;
    }
    @keyframes loading {
        from {left: 50%; width: 0;z-index:100;}
        33.3333% {left: 0; width: 100%;z-index: 10;}
        to {left: 0; width: 100%;}
    }
</style>
<body class="white-content">
    <div id="preloader">
        <!-- <div class="load-bar">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div> -->
        <div id="status">&nbsp;</div>
    </div>
    <div class="wrapper">
        <?php echo $page["sidebar"]; ?>
        <div class="main-panel">
            <?php echo $page["header"]; ?>
            <?php echo $content;?>
            <?php echo $page["footer"]; ?> 
        </div>   
    </div>
    <?php echo $page['main_js'];?>
    <script type="text/javascript">
        <?php if(isset($javascript)){ echo $javascript; } ?>
    </script>
    <script type="text/javascript">
        $(window).on('load', function() { // makes sure the whole site is loaded 
            $('#preloader').delay(300).fadeOut('slow'); // will fade out the white DIV that covers the website. 
            $('body').delay(300).css({'overflow':'visible'});
        })
    </script>
</body>
</html>