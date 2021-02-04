<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/app.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Фильтрация Elasticsearch</title>
</head>
<body>
<div class="container ">
    <div class="row">
        <div class="col-6 gy-5">
        <form id="formSearch">
            <div class="mb-3 col-10">
                <label class="form-label">Возраст</label>
                <div class="row">
                    <div class="col-3"><input type="text" name="age_min" class="form-control minField" value="0"></div>
                    <div class="col-3"><input type="text" name="age_max" class="form-control" value="30"></div>
                </div>
            </div>
            <div class="mb-3 col-10">
                <label for="exampleInputEmail1" class="form-label">Имя</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3 col-10">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3 col-10">
                <label for="exampleInputEmail1" class="form-label">Телефон</label>
                <input type="number" class="form-control" name="phone">
                <div id="emailHelp" class="form-text">Поиск только по 3-м цифрам оператора</div>
            </div>
            <button type="submit" id="sendFilter" class="btn btn-primary">Найти</button>
        </form>
        </div>
        <div class="col-6 gy-5">
            <table class="table" id="usersTable">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Возраст</th>
                    <th scope="col">Email</th>
                    <th scope="col">Телефон</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row" colspan="5">Нет записей</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>

<script>
    $('input[name="age"]').val(0);
    $('#sendFilter').on('click', function(e) {
        e.preventDefault();
        jQuery.ajax({
            type: 'post',
            url: '/?find=yes',		
			data: jQuery('#formSearch').serialize(),
            dataType: 'json',
            success:function(json){
                var tpl = '';
                if(json.length > 0) {
                    for (const item in json) {
                        tpl += '<tr>';
                            tpl += '<td>'+json[item]['_id']+'</td>';
                            tpl += '<td>'+json[item]['_source']['name']+'</td>';
                            tpl += '<td>'+json[item]['_source']['age']+'</td>';
                            tpl += '<td>'+json[item]['_source']['email']+'</td>';
                            tpl += '<td>'+json[item]['_source']['phone']+'</td>';
                        tpl += '</tr>';
                    }
                } else {
                    tpl = '<tr><td scope="row" colspan="5">Нет записей</td></tr>';
                }
                $("#usersTable tbody").html(tpl);
            }
        });
    });

</script>

</body>
</html>

