<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <title>Kategori / Alt Kategori İşlemleri</title>
</head>
<body>
    <?php 
        /* SQL İşlemleri*/
        require_once "lib/db.php";
        require_once "lib/functions.php";
        $category_list = $db->query("SELECT * FROM category", PDO::FETCH_OBJ)->fetchAll(); /*FETCH OBJ [''] yerine -> ile dataya ulaşmak için*/
    ?>
    <div class="container">
        <h3 class="text-center">Kategori / Alt Kategori İşlemleri</h3>
        <div class="row">
            <div class="col-md-6 bg-warning">
                <h4 class="text-center">Kategori Ekle</h4>
                <hr>
                <form action="lib/category_db.php" method="post">
                    <div class="form-group">
                        <label for="">Kategori Adı : </label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="">Varsa Üst Kategori Adı : </label>
                        <select name="parent_id" class="form-control">
                            <option selected value="0">Yok</option>
                            <?php foreach($category_list as $category){?>
                                <option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Kaydet</button>
                    <button type="submit" class="btn btn-danger btn-sm">İptal Et</button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="col-md-11 bg-warning">
                    <h4 class="text-center">Kategori Hiyerarşisi</h4>
                    <hr>
                    <?php drawElements(buildTree($category_list));?>
                </div>
            </div>
        </div>
    </div>

    <!--Bootstrap Js-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>