



<?php if(isset($event)){ ?>

<select class="custom-select" name="categorie" >
<option value="" selected disabled>Categorie</option>
<?php foreach($liste_categorie as $categoire){ ?>
    <?php if($categoire->get("id")== $event->get("categorie")->get("id")){?>
        <option value="<?= $event->get("categorie")->get("id")?>" selected><?= $event->get("categorie")->get("categorie") ?></option>
    <?php }else{ ?>
      
        <option value="<?= $categoire->get("id")?>" ><?= $categoire->get("categorie") ?></option>

    <?php }?>
   
  
<?php } ?>


</select>

<?php }else{?>

    <select class="custom-select" name="categorie" required>
<?php foreach($liste_categorie as $categoire){ ?>
     
        <option value="<?= $categoire->get("id")?>" ><?= $categoire->get("categorie") ?></option>
 

  
<?php } ?>
  

</select>

<?php } ?>