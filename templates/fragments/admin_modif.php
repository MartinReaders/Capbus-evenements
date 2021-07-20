
<!DOCTYPE html>
<html>
 <head>
  <title>Page Admin</title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  
 </head>
 <body>
  <div class="container mt-5">
  <?php include "templates/fragments/forme_create_location.php" ?>
  <?php include "templates/fragments/forme_create_categorie.php" ?>
   <div class="panel panel-default">
    
    <div class="panel-body">
    <form action="controllerModif.php" method="post" enctype="multipart/form-data">

      <h2 class="text-center">Titre</h2>
      <textarea name="title" id="content-title" class="form-control ckeditor mb-5">
     <?= stripslashes($event->get("title")) ?>
     </textarea>  

     <h2 class="text-center">Image</h2>
     <textarea name="img" id="content-img" class="form-control ckeditor mb-5">
      <?= stripslashes($event->get("img")) ?>
     </textarea>

     <h2 class="text-center">Description</h2>
     <textarea name="content" id="content" class="form-control ckeditor mb-5">
     <?= stripslashes($event->get("description")) ?>
     </textarea>

     <div class="form-group pt-2">
      <label for="form-date">Date</label>
      <input class="form-control" name="date" value="<?= $event->get("date")?>" id="form-date" type="date">
    </div>

    <div class="form-group pt-2">
      <label for="form-time">l'heure</label>
      <input class="form-control" name="time" value="<?= $event->get("time")?>" id="form-time" type="time">
    </div>
    <div class="form-group pt-2">
    <label for="form-time">Lieu</label>
    <?php include "liste_location.php"?>
    </div>

    <div class="form-group pt-2">
    <label for="form-time">Categorie</label>
    <?php include "liste_categorie.php"?>
    </div>

    <div class="form-check form-switch">
    <?php if($event->get("online")==="1"){ ?>
  <input class="form-check-input online" name="online" type="checkbox" id="flexSwitchCheckChecked" checked>
    <?php } else{ ?>
        <input class="form-check-input online" name="online" type="checkbox" id="flexSwitchCheckChecked" >
  <?php } ?>
  <label class="form-check-label" for="flexSwitchCheckChecked">Online</label>
</div>
</div>
     
     <button class="btn btn-primary">Enregistrer</button>

        <input type="hidden" name="id" value="<?= $id ?>">

    </form>
  
    </div>
   </div>
  </div>
 </body>
</html>

<script>
 CKEDITOR.replace( 'content', {
  height: 200,
  

  allowedContent : true,
  extraPlugins: "colorbutton,justify,font,link,div,colordialog",
  

 });

 CKEDITOR.replace( 'content-title', {
  height: 100,
  

  allowedContent : true,
  extraPlugins: "colorbutton,justify,font,link,div,colordialog",
  

 });

 CKEDITOR.replace( 'content-img', {
  height: 400,
  
  filebrowserUploadUrl: "upload.php",
  allowedContent : true,
  extraPlugins: "colorbutton,justify,font,link,div,colordialog",
  

 });






</script>
