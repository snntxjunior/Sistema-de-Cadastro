<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h1 class="text-center">
                    Sistema de Cadastro
                </h1>
            </div>
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <?php
                        require_once 'Model.php';
                        $model = new Model();
                        $id = $_REQUEST['id'];
                        $row = $model->edit($id);

                        if (isset($_POST['update'])) {
                            if (isset($_POST['name']) && (isset($_POST['email'])) && (isset($_POST['whats'])) && (isset($_POST['address']))){
                                if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['whats']) && !empty($_POST['address'])) {
                                    $data['id'] = $id;
                                    $data['name'] = $_POST['name'];
                                    $data['email'] = $_POST['email'];
                                    $data['whatsapp'] = $_POST['whats'];
                                    $data['endereco'] = $_POST['address'];

                                    $update = $model->update($data);
                                    if ($update) {
                                        echo "<script>alert('Gravado com sucesso!')</script>";
                                        echo "<script>window.location.href='list.php'</script";
                                    }else {
                                        echo "<script>alert('Falhou!')</script>";
                                        echo "<script>window.location.href='list.php'</script";
                                    }
                                }else{
                                    echo "<script>alert('Erro!')</script>";
                                    header("Location: edit.php?id=$id");
                                }
                            }
                        }
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nome">Name</label>
                            <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nome">E-mail</label>
                            <input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nome">Whatsapp</label>
                            <input type="tel" name="whats" value="<?php echo $row['whatsapp']; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nome">Endereço</label>
                            <textarea name="address" rows="3" class="form-control" required><?php echo $row['endereco']; ?>"</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="update" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
