



<?php if(isset($event)){ ?>

<select class="custom-select" name="location" >
    <option value="" selected disabled>Lieu</option>
<?php foreach($liste_location as $loaction){ ?>
    <?php if($loaction->get("id") == $event->get("location")->get("id")){?>
        <option value="<?= $event->get("location")->get("id")?>" selected><?= $event->get("location")->get("location") ?></option>
    <?php }else{ ?>
        
        <option value="<?= $loaction->get("id")?>" ><?= $loaction->get("location") ?></option>

    <?php }?>
    
  
<?php } ?>
  
 
</select>




<?php } else {?>

    <select class="custom-select" name="location" required>
<?php foreach($liste_location as $loaction){ ?>
  
        <option value="<?= $loaction->get("id")?>"><?= $loaction->get("location") ?></option>
 

  
<?php } ?>
  

    
</select>

<?php } ?>







