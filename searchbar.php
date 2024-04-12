<?php 
include __DIR__ . '/includes/db.php';

$search = $_GET['search'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM Users WHERE CONCAT(Name, Surname) LIKE ?") ;
$stmt->execute([
    "%$search%"
]);

include __DIR__ . '/includes/initial.php';
include __DIR__ . '/includes/navbar.php' ?>


    <h1 class="text-center">La nostra lista clienti</h1>

    <form class="row g-3">
        <div class="col">
            <input type="text" name="search" class="form-control" placeholder="Cerca una pizza">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Cerca</button>
        </div>
    </form>

    <div class="d-flex flex-wrap justify-content-center text-center">
        <?php
            foreach ($stmt as $row) { ?>
                
    
                <div class="card m-3" style="width: 300px;">
      
      <div class="card-body ">
        <h5 class="card-title "><?= "$row[Name] - $row[Surname]" ?></h5>
        
        <div class="mt-3">
            <a href="http://localhost:8080/U4-W1-D3/dettagli.php?id=<?= $row['id'] ?>" class="btn btn-primary">Dettagli</a>
            <a href="http://localhost:8080/U4-W1-D3/elimina.php?id=<?= $row['id'] ?>" class="btn btn-warning">Modifica</a>
                        <a href="http://localhost:8080/U4-W1-D3/elimina.php?id=<?= $row['id'] ?>" class="btn btn-danger">Elimina</a>
                        
        </div>
      </div>
    </div>
                    
                    
                <?php
            } ?>
    </div>
    

    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link">Previous</a>
            </li>

            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>

            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div><?php

include __DIR__ . '/includes/end.php';