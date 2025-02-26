<?php
	include_once '../Controller/ticketC.php';
  include_once '../Controller/projC.php';
  include_once '../Controller/salleC.php';
  include_once '../Controller/reservationR.php';
	$ticketC=new ticketC();
  $projC=new projC();
  $salleC=new salleC();
  $reservationR=new reservationR();
  $listticket=$ticketC->Listtickets(); 
    if (!isset($_GET['id_proj']))
    {
      header('Location:../index.php');
    }
    $proj = $projC->recupererproj($_GET['id_proj']);
    $salle = $salleC->recuperersalle($proj['id_salle']);
    $siege = $salle['nb_places'];
    ?>
<!DOCTYPE html>
<html lang="en">
<?php 
  $title="Reserver";
  ?>
<?php
      // include header partial
      require_once '../film/partials/_includehead.php';

      
    ?>
  <link rel="stylesheet" href="css/notfound.css">
  <style>
    .mdi-active 
    {
      color: #006A4E;
    }
    .mdi-reserved 
    {
      color: #0000FF;
      pointer-events: none;
    }
  </style>

<body>
    <div class="container">
        <?php
      // include header partial
      require_once '../film/partials/_navbar.php';
    ?>

        <main>
            <div class="main-panel">
                <div class="content-wrapper">
                <br>
                <br>
                <div class="card_film">
                <div>
  <div class="starsec"></div>
  <div class="starthird"></div>
  <div class="starfourth"></div>
  <div class="starfifth"></div>
</div>
                <center><h3>Select your reservation type</h3></center>
                            <br>
                            <br>
                            <div class="c-btn-group c-btn-group--block">
                                <?php
                                				foreach($listticket as $ticket){
                                                    if(!($ticket['prix']==0)){
                                                    ?>
                            <a class="c-btn" id="<?php echo $ticket['id_ticket']; ?>" onclick="getID(this.id)"><?php $ticket['type']; ?></i><p><?php echo $ticket['type']; ?></p><p><?php echo $ticket['prix']; ?> DT</p></a>
                            <?php }
                                                }
                            ?>
                            </div>
                            <br>
                            <br>
                            <center>
                              
                                <p class="" style="display:inline;font-size: 15px;">Available&nbsp;</p>
                                <p class="mdi-reserved" style="display:inline;font-size: 15px;">Reserved&nbsp;</p>
                                <p class="mdi-active" style="display:inline;font-size: 15px;">Selected</p>
                                <br>
                                <br>
                                
                            <?php 
                                  $i = 1;
                                  for ($x = 1; $x <= $siege; $x++) {
                                    $i++;
                                    if($i == 10)
                                    {
                                      $i = 2;
                                      echo '<br>';
                                    }
                                    $class="";
                                    if ($reservationR->isreserved($_GET['id_proj'],$x))
                                    {
                                      $class='mdi-reserved';
                                    }
                                    
                                    ?>
                                    
                                    <a href="#" class="chair <?php echo $class;?>" style="display:inline;" id="<?php echo $x; ?>" onclick="getIDchair(this.id)">
                                    <i class="mdi mdi-chair-rolling" style="font-size: 50px;">

                                  </i>
                                  </a>
                                    <?php } ?>
                                  </center>
                            <form action="../Process/pay_service_reserver.php" method="post" class="forms-sample">
                            <input type="hidden" name="reservation" id="reservation" value = "5">
                            <input type="hidden" name="chair" id="chair" value="5">
                            <input type="hidden" name="id_proj" id="id_proj" value="<?php echo $_GET['id_proj'];?>">
                            <br>
                            
                            <center>
                                <br>
                                <br>
                    <br>
                            <button type="submit" name="reserve" id="reserve" onclick="return dosubmit()" disabled class="btn btn-primary">Reserver</button>
                            </center>
                            </form>
                </div>

                
                </div>
            </div>
        </main>


        <?php
      // include header partial
      require_once '../film/partials/_footer.html';
    ?>

    </div>

    <?php
  // include header partial
  require_once '../film/partials/_includeend.html';
?>
</body>
<script>
    const buttons = document.querySelectorAll(".c-btn");
buttons.forEach(button => {
    
  button.addEventListener("click",() => {5
    // do some action according to button
    buttons.forEach(button => {
        button.classList.remove("c-btn--active");
    })
    // show success feedback
    button.classList.add("c-btn--active");
    document.getElementById("reserve").disabled = false;
  })
})
const buttonschair = document.querySelectorAll(".chair");
buttonschair.forEach(button => {
    
  button.addEventListener("click",() => {5
    // do some action according to button
    buttonschair.forEach(button => {
      button.classList.remove("mdi-active");
    })
    // show success feedback
    button.classList.add("mdi-active");
  })
})
function getID(btnID){
    document.getElementById("reservation").value=btnID;
}
function getIDchair(btnID){
    document.getElementById("chair").value=btnID;
}


    </script>
</html>