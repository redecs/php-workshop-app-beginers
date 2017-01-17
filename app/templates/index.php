<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo App</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted pull-left">Todo App</h3>
        <span class="pull-right">From 0 to !0 #5: PHP Workshop</span>
    </div>

    <div class="jumbotron">
        <form action="?add" method="post" class="form-inline">
            <div class="form-group">
                <input name="todo" type="text" class="form-control" placeholder="Add something to the list">
            </div>
            <button type="submit" class="btn btn-default">Add</button>
        </form>
    </div>

    <div class="row marketing">
        <div class="col-lg-12">
            <ul class="list-group">
                <?php foreach($todos as $item): ?>
                <li class="list-group-item">
                    <span><?php echo $item['todo']; ?></span>
                    <div class="actions pull-right">
                        <form action="?action=done" method="post">
                            <input name="id" type="hidden" value="<?=$item['id']?>">
                            <button
                            <?php if($item['done']):?> disabled="disabled"<?php endif; ?>
                            type="submit"
                            class="btn btn-xs btn-success">mark as done</button>
                        </form>
                        <form action="?action=delete" method="post">
                            <input name="id" type="hidden" value="<?=$item['id']?>">
                            <button type="submit" class="btn btn-xs btn-danger">remove</button>
                        </form>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
            <p>Items in list: <?=$count?></p>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2017 Softbinator</p>
    </footer>

</div> <!-- /container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>