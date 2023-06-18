<?php
$pagename = 'Home';
    include_once '../navbar.php';
    include_once '../data.php';
    ?>
 
<?php for ($i = 1; $i <= count($users); $i++):?>
    <div style="width: 18rem;background-color:<?= $users["user$i"]['clr'] ?>;border: 3px solid black;padding: 5px;">
  <div>
    <h5 ><?= $users["user$i"]['name'] ?></h5>
    <h6 ><?= $users["user$i"]['age'] ?></h6>
    <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#">Card link</a>
    <a href="#">Another link</a>
  </div>
</div>
<?php endfor ?>
</body>
</html>