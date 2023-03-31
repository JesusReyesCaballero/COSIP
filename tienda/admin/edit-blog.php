<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    $id = intval($_GET['id']);
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $autor = $_POST['autor'];
        $short = $_POST['short'];
        $content = $_POST['content'];
        $sql = mysqli_query($con, "update blog set title='$title',autor='$autor',short='$short', content='$content' where id='$id'");
        $_SESSION['msg'] = "Noticia actualizada exitosamente !!";
    }

?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin| Noticia</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
        <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>

        <script>
            function getSubcat(val) {
                $.ajax({
                    type: "POST",
                    url: "get_subcat.php",
                    data: 'cat_id=' + val,
                    success: function(data) {
                        $("#subcategory").html(data);
                    }
                });
            }

            function selectCountry(val) {
                $("#search-box").val(val);
                $("#suggesstion-box").hide();
            }
        </script>
    </head>

    <body>
        <?php include('include/header.php'); ?>

        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <?php include('include/sidebar.php'); ?>
                    <div class="span9">
                        <div class="content">

                            <div class="module">
                                <div class="module-head">
                                    <h3>Noticia</h3>
                                </div>
                                <div class="module-body">

                                    <?php if (isset($_POST['submit'])) { ?>
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>Todo bien!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                        </div>
                                    <?php } ?>


                                    <br />

                                    <form class="form-horizontal row-fluid" name="Category" method="post">
                                        <?php
                                        $id = intval($_GET['id']);
                                        $query = mysqli_query($con, "select * from blog where id='$id'");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">Titulo</label>
                                                <div class="controls">
                                                    <input type="text" name="title" placeholder="Ingrese titulo de la noticia" value="<?php echo  htmlentities($row['title']); ?>" class="span8 tip" required>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">Autor</label>
                                                <div class="controls">
                                                    <input type="text" name="autor" placeholder="Ingrese autor de la noticia" value="<?php echo  htmlentities($row['autor']); ?>" class="span8 tip" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">Resumen</label>
                                                <div class="controls">
                                                    <input type="text" name="short" placeholder="Ingrese resumen de la noticia" value="<?php echo  htmlentities($row['short']); ?>" class="span8 tip" required>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">Contenido de la noticia</label>
                                                <div class="controls">
                                                    <textarea name="content" placeholder="Ingrese contenido de la noticia" rows="6" class="span8 tip"><?php echo htmlentities($row['content']); ?>
                                                    </textarea>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">Imagen</label>
                                                <div class="controls">
                                                    <img src="blog_images/<?php echo htmlentities($id); ?>/<?php echo htmlentities($row['image']); ?>" width="250" height="100"> <a href="update-img-blog.php?id=<?php echo $row['id']; ?>">Cambiar Imagen</a>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit" class="btn">Actualizar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('include/footer.php'); ?>

        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('.datatable-1').dataTable();
                $('.dataTables_paginate').addClass("btn-group datatable-pagination");
                $('.dataTables_paginate > a').wrapInner('<span />');
                $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
                $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
            });
        </script>
    </body>
<?php } ?>