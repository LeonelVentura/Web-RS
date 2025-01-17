<?php
session_start();
$varsesion = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Comentarios</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="../vendor/emoji-picker/lib/css/emoji.css" rel="stylesheet">
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../vendor/emoji-picker/lib/js/config.js"></script>
    <script src="../vendor/emoji-picker/lib/js/util.js"></script>
    <script src="../vendor/emoji-picker/lib/js/jquery.emojiarea.js"></script>
    <script src="../vendor/emoji-picker/lib/js/emoji-picker.js"></script>
</head>

    <section id="jjjd" class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php include "../conexion.php"; ?>
                    <br>
                    <br>
                    <h3>Comentario</h3>
                    <p>Cuentanos tu opinión acerca de nuestro sitio</p>
                    <br>
                    <div class="contact-info col-lg-6 wow fadeInUp" data-wow-duration="500ms">
                        <form id="frm-comment">
                            <div class="input-row">
                                <input type="hidden" name="comment_id" id="post" />
                                <label for="nombre" class="form-label">Usuario:</label>
                                <?php if (isset($_SESSION['nombre']) && isset($_SESSION['apellido'])): ?>
                                    <input class="form-control" type="text" name="nombre" id="nombre" readonly value="<?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?>" required />
                                <?php else: ?>
                                    <input class="form-control" type="text" name="unknow_name" readonly value="Debes registrarte para Comentar" />
                                <?php endif; ?>
                            </div>
                            <div class="input-row">
                                <label for="comme" class="form-label">Comentario:</label>
                                <p class="emoji-picker-container">
                                    <textarea rows="6" class="form-control" name="comentario" id="comentario" placeholder="Agregue su comentario" required></textarea>
                                </p>
                            </div>
                            <div>
                                <input type="button" class="btn btn-primary" id="submitButton" value="Agregar Comentario" />
                            </div>
                            <br>
                            <div id="comment-message">¡Tu comentario se agregó!</div>
                        </form>
                    </div>
                    <div id="output"></div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sessionNombre = "<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?>";
            var sessionApellido = "<?php echo isset($_SESSION['apellido']) ? $_SESSION['apellido'] : ''; ?>";
            var inputUsuario = document.getElementById('nombre');
            var inputUnknown = document.getElementById('unknow_name');
            if (sessionNombre && sessionApellido) {
                inputUsuario.value = sessionNombre + ' ' + sessionApellido;
            } else {
                inputUnknown.style.display = 'block'; // Mostrar el campo para usuarios desconocidos
            }
        });

        function postReply(post) {
            $('#post').val(post);
            $("#nombre").focus();
        }

        $("#submitButton").click(function () {
            $("#comment-message").css('display', 'none');
            var str = $("#frm-comment").serialize();
            $.ajax({
                url: "../controlador/controlador_insertar_respuesta.php",
                data: str,
                type: 'post',
                success: function (response) {
                    $("#comment-message").css('display', 'inline-block');
                    $("#comentario").val("");
                    $("#post").val("");
                    listComment();
                }
            });
        });

        $(document).ready(function () {
            listComment();
        });

        $(function () {
            window.emojiPicker = new EmojiPicker({
                emojiable_selector: '[data-emojiable=true]',
                assetsPath: '../vendor/emoji-picker/lib/img/',
                popupButtonClasses: 'icon-smile'
            });
            window.emojiPicker.discover();
        });

        function listComment() {
    $.post("../views/Lista_Comentarios.php", function (data) {
        try {
            var comments = "";
            var replies = "";
            var item = "";
            var parent = -1;
            var results = [];
            var list = $("<ul class='outer-comment'>");
            var item = $("<li>").html(comments);

            for (var i = 0; i < data.length; i++) {
                var post = data[i]['id'];
                parent = data[i]['respuesta'];

                if (parent == "0") {
                    comments = "<div class='comment-row'>" +
                        "<div class='comment-info'><img src='../views/user.png' width='50px'><span class='posted-by'>" + data[i]['nombre'].toUpperCase() + "</span></div>" +
                        "<div class='comment-text'>" + data[i]['comentarios'] + "</div>" +
                        "<div><a class='btn-reply' onClick='postReply(" + post + ")'>Responder</a></div>" +
                        "<div class='comment-text'>" + data[i]['fecha'] + "</div>" + "</div>";
                    var item = $("<li>").html(comments);
                    list.append(item);
                    var reply_list = $('<ul>');
                    item.append(reply_list);
                    listReplies(post, data, reply_list);
                }
            }
            $("#output").html(list);
        } catch (e) {
            console.error("Error parsing JSON:", e);
        }
    });
}


        function listReplies(post, data, list) {
            for (var i = 0; i < data.length; i++) {
                if (post == data[i].respuesta) {
                    var comments = "<div class='comment-row'>" +
                        " <div class='comment-info'><img src='user.png' width='50px'><span class='posted-by'>" + data[i]['nombre'].toUpperCase() + " </span></div>" +
                        "<div class='comment-text'>" + data[i]['comentarios'] +
                        "<div class='comment-text'>" + data[i]['fecha'] + "</div>" +
                        "<div><a class='btn-reply' onClick='postReply(" + data[i]['id'] + ")'>Responder</a></div>" +
                        "</div>";
                    var item = $("<li>").html(comments);
                    var reply_list = $('<ul>');
                    list.append(item);
                    item.append(reply_list);
                    listReplies(data[i].id, data, reply_list);
                }
            }
        }
    </script>
</body>
</html>
