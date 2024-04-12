<?php
include __DIR__ . '/includes/db.php';


$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$_GET["id"]]);

$row = $stmt->fetch();

include __DIR__ . '/includes/initial.php'; 
include __DIR__ . '/includes/navbar.php' ?>

    <div class="d-flex flex-wrap">
     <div class="card m-3" style="width: 250px;">
    <div class="card-body">
        <h5 class="card-title"><?= "$row[Name] - $row[Surname]" ?></h5>
        <p class="card-text"><?= "$row[Age]" ?> Anni <span class="d-block"><?= "$row[Hobbies]" ?></span></p>
        <a href="http://localhost:8080/U4-W1-D3/dettagli.php?id=<?= $row['id'] ?>" class="btn btn-primary">Vai</a>
                    <a href="http://localhost:8080/U4-W1-D3/elimina.php?id=<?= $row['id'] ?>" class="btn btn-danger">Elimina</a>
      </div>
    </div>
                    
                    
               
    </div>
    
    
    
    
    <?php

    
   

include __DIR__ . '/includes/end.php';