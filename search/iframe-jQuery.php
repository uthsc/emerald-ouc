<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
</head>
<body>
<iframe id="iframeID" src="campus-search.html?q=<?php echo $_GET["q"] ?>" scrolling="no"></iframe>

<script type="text/javascript">
    $("#iframeID").load(function() {
        $(this).height( $(this).contents().find("html").height() );
    });
</script>
<!--**********************-->
<!--/Campus Search Results-->
<!--**********************-->

</div>
</body>
</html>