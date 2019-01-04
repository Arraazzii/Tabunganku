<!DOCTYPE html>
<html>
<?php echo $page["head"]; ?>
<style type="text/css">
<?php if(isset($css)){ echo $css; } ?> 
</style>
<body class="white-content">
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
</body>
</html>