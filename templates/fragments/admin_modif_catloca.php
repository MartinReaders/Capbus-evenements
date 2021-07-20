<div class="container mt-5">
  
   <div class="panel panel-default">
    
    <div class="panel-body">
    <form action="controllerModifCatLoc.php" method="post" enctype="multipart/form-data">

   
     <div class="form-group pt-2">
        <?php if($mod == "local"){ ?>
            <label for="form-date">Localisation</label>

            <input class="form-control" name="location" value="<?= $location->get("location")?>"  type="text">
            <input type="hidden" name="id" value="<?= $location->get("id")?>">
            <input type="hidden" name="mode" value="local">
        <?php }else { ?>
            <label for="form-date">Categorie</label>

            <input class="form-control" name="categorie" value="<?= $categorie->get("categorie")?>"  type="text">
            <input type="hidden" name="id" value="<?= $categorie->get("id")?>">
            <input type="hidden" name="mode" value="cat">
        <?php } ?> 

    </div>

  
   

   
</div>
     
     <button class="btn btn-primary">Enregistrer</button>

      

    </form>



