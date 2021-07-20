
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
    <form action="controllerCreate.php" method="post" enctype="multipart/form-data">

      <h2 class="text-center">Title</h2>
      <textarea name="title" id="content-title" class="form-control ckeditor mb-5" required>
     
     </textarea>  

     <h2 class="text-center">Image</h2>
     <textarea name="img" id="content-img" class="form-control ckeditor mb-5" required>
     
     </textarea>

     <h2 class="text-center">Description</h2>
     <textarea name="content" id="content" class="form-control ckeditor mb-5"required>
    
     </textarea>

     <div class="form-group pt-2">
      <label for="form-date">date</label>
      <input class="form-control" name="date"  id="form-date" type="date" required>
    </div>

    <div class="form-group pt-2">
      <label for="form-time">time</label>
      <input class="form-control" name="time" id="form-time" type="time" required>
    </div>


    <div class="form-group pt-2">
    <?php include "liste_location.php"?>
    </div>

    <!-- <div class="form-group pt-2">
      <label for="form-time">Lieu</label>
      <input class="form-control" name="location"  id="form-time" type="text">
    </div> -->


 <div class="form-group pt-2">
    <?php include "liste_categorie.php"?>
 </div>

    <div class="form-check form-switch">

  <input class="form-check-input online" name="online" type="checkbox" id="flexSwitchCheckChecked">
    
  <label class="form-check-label" for="flexSwitchCheckChecked">Online</label>

</div>

   
</div>
     
     <button class="btn btn-primary">Enregistrer</button>

       

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
