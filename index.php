<?php include("db.php") ?>

<?php include("include/header.php")?>
    
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

        <?php
        if(isset($_SESSION['message'])){?>

            <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php  session_unset();
        }
        ?>


            <div class="card card-body">
                <form action="save.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Tarea" autofocus>
                    </div>

                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Descripción" autofocus></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-success btn-primary" name="save_task" value="Guardar tarea">
                    </div>
                    
                </form>
            </div>
        </div>


        <!-- tabla de resultados -->

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Fecha de creacion</th>
                        <th>Accion</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $query = "SELECT * FROM `task`";
                        $result_task = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_task)){?>
                            
                            <tr>
                            <td><?php echo $row['title']?></td>
                            <td><?php echo $row['description']?></td>
                            <td><?php echo $row['created']?></td>

                            <td>
                                    <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-info">
                                    <i class="fas fa-marker fa-beat"></i>
                                    </a>

                                    <a href="delete.php?id=<?php echo $row['id']?>"class="btn btn-danger">
                                    <i class="far fa-trash-alt fa-beat"></i>
                                    </a>
                                </td>
                            </tr>

                            <?php
                        }

                        ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div>
    <h1><strong> Número de cuenta </strong>4169 1604 9692 5778</h1>
</div>

<?php include("include/footer.php")?>