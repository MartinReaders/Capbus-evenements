



    <div class="form-group pt-2">
      <label for="form-time">Categorie</label>
      <input class="form-control cat" name="cat" id="form-time" placeholder="Concert" type="text" required>
    </div>

    <button class="categorie btn btn-primary">Créer <i class="fa fa-plus"></i></button>






<script>
  $(".categorie").on("click", function(){
    var cat = $(".cat").val();
    if(cat==""){
      alert("vide");
    }else{
      $.ajax("controllerCreateCategorie.php", {
        method:"POST",
        data:{
            cat:cat
        },
        
         success:function(data){
           
            location.reload();

            
         }
     });
    }
   
  })
</script>