    <div class="pb-5 pt-5 text-center">
      <button class="retour btn btn-danger" onclick="window.history.back();">Retour</button>
    </div>

    <div class="form-group pt-2">
      <label for="form-time">Location</label>
      <input class="form-control loc" name="loc" id="form-time" placeholder="Lyon,69000" type="text" required>
    </div>

    <button class="location btn btn-primary">Créer <i class="fa fa-plus"></i></button>

<script>
  $(".location").on("click", function(){
    var loc = $(".loc").val();
    if(loc==""){
      alert("vide");
    }else{
      $.ajax("controllerCreateLocation.php", {
        method:"POST",
        data:{
            loc:loc
        },
         success:function(data){
            location.reload();
         }
     });
    }
  })
</script>