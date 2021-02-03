<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/app.php');
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container ">
    <div class="row">
        <div class="col-6 gy-5">
        <form class="">
            <div class="mb-3 col-10">
                <label class="form-label">Age</label>
                <div class="row">
                    <div class="col-3"><input type="text" class="form-control minField" value="0"></div>
                    <div class="col-3"><input type="text" class="form-control" value="30"></div>
                </div>
            </div>
            <div class="mb-3 col-10">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3 col-10">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" name="mail">
            </div>
            <div class="mb-3 col-10">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input type="number" class="form-control" name="phone">
                <div id="emailHelp" class="form-text">Поиск только по 3-м цыфрам оператора</div>
            </div>
            <button type="submit" id="sendFilter" class="btn btn-primary">Фильтровать</button>
        </form>
        </div>
        <div class="col-6 gy-5">
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>
    </div>
</div>




<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>


<script>
    $('input[name="age"]').val(0);
    $('#sendFilter').on('click', function(e) {
        e.preventDefault();
        console.log($('input[name="age"]').val());
    });
</script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->
</body>
</html>

