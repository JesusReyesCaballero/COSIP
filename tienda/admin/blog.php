<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $autor = $_POST['autor'];
        $short = $_POST['short'];
        $content = $_POST['content'];
        $img = $_FILES["image"]["name"];

        $query = mysqli_query($con, "select max(id) as id from blog");
        $result = mysqli_fetch_array($query);
        $id = $result['id'] + 1;

        if ($_FILES["image"]["error"] > 0) {
            echo "Error al cargar imagen";
        } else {
            $formats = array("image/jpg", "image/jpeg", "image/png");
            if (in_array($_FILES["image"]["type"], $formats)) {
                $dir = "blog_images/" . $id . "/";
                $image = $dir . $_FILES["image"]["name"];
                echo $image;
                if (!file_exists($dir)) {
                    mkdir($dir);
                }

                if (!file_exists($image)) {
                    $resultado = @move_uploaded_file($_FILES["image"]["tmp_name"], $image);
                    if ($resultado) {
                        chmod($image, 0766);
                        $sql = mysqli_query($con, "insert into blog(title, autor, short, content, image) values('$title','$autor','$short','$content', '$img')");
                        $_SESSION['msg'] = "Noticia publicada exitosamente !!";
                    }
                } else {
                    echo "La imgen ingresada ya existe";
                }
            } else {
                echo "Formato de imagen invalido";
            }
        }
    }
    if (isset($_GET['del'])) {
        mysqli_query($con, "delete from blog where id = '" . $_GET['id'] . "'");
        $_SESSION['delmsg'] = "Noticia Eliminada !!";
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

    </head>

    <body>
        <?php include('include/header.php'); ?>

        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <?php include('include/sidebar.php'); ?>
                    <div class="span11">
                        <div class="content">
                            <div class="module">
                                <div class="module-head">
                                    <h3>Publicar Noticia</h3>
                                </div>
                                <div class="module-body">

                                    <?php if (isset($_POST['submit'])) { ?>
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>Todo bien!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                        </div>
                                    <?php } ?>

                                    <?php if (isset($_GET['del'])) { ?>
                                        <div class="alert alert-error">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>Oh vaya!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                                        </div>
                                    <?php } ?>

                                    <br />

                                    <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Titulo</label>
                                            <div class="controls">
                                                <input type="text" name="title" placeholder="Ingrese titulo de la noticia" class="span8 tip" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Autor</label>
                                            <div class="controls">
                                                <input type="text" name="autor" placeholder="Ingrese autor de la noticia" class="span8 tip" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Resumen</label>
                                            <div class="controls">
                                                <input type="text" name="short" placeholder="Ingrese resumen de la noticia" class="span8 tip" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Contenido</label>
                                            <div class="controls">
                                                <textarea name="content" placeholder="Ingrese contenido de la noticia" rows="6" class="span8 tip">
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Imagen</label>
                                            <div class="controls">
                                                <input type="file" name="image" id="image" value="" class="span8 tip" required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit" class="btn">Publicar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="module">
                                <div class="module-head">
                                    <h3>Administrar Noticias</h3>
                                </div>
                                <div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Titulo</th>
                                                <th>Autor</th>
                                                <th>Resumen</th>
                                                <th>Fecha de Publicacion</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $query = mysqli_query($con, "select * from blog");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><a href="/COSIP/blog-details.php?ip=<?php echo $row['id'] ?>"><?php echo htmlentities($row['title']); ?></a></td>
                                                    <td><?php echo htmlentities($row['autor']); ?></td>
                                                    <td> <?php echo htmlentities($row['short']); ?></td>
                                                    <td><?php echo htmlentities($row['published']); ?></td>
                                                    <td>
                                                        <a href="edit-blog.php?id=<?php echo $row['id'] ?>"><i class="icon-edit"></i></a>
                                                        <a href="blog.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Esta seguro que desea elimanar?')"><i class="icon-remove-sign"></i></a>
                                                    </td>
                                                </tr>
                                            <?php $cnt = $cnt + 1;
                                            } ?>

                                    </table>
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