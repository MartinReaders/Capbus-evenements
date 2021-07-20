
<div class="title_home">

<h2>Trouvez votre évènement</h2>
<h2 style="color:#AFD135">et voyagez avec votre réseau de transport CAP'bus</h2>
<a href="https://www.capbus.fr/"><img src="img/fond/logocap.png" alt=""></a>
</div>

<div class="gt-separate">
    <div class="gt-icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
    </div>
</div>



<div class="containerp mt-4">
  

  <div class="container">
  
  <div class="row mb-4" style="justify-content: center;">
		
		<div class="col-md-6">
			<div>
      <form class="input-group input-group-lg"  action="rechercher-des-evenements.php" method="post">
      <?php include "templates/fragments/liste_location.php" ?>
			<?php include "templates/fragments/liste_categorie.php" ?>
       <input class="form-control" name="date"  id="form-date" style="width: 10%;" type="date">
       
				<div class="input-group-append">
					<button class="btn btn-outline-secondary" ><i class="fas fa-search"></i></button>
				</div>
        </form>
			</div>
      <?php if(isset($mode) and $mode=="1") {?>
        <div class="text-center mt-2">
      <a class="btn btn-primary" href="index.php">Supprimer les filtres <i class="fa fa-reply-all"></i></a>
      </div>

      <?php }?>

		</div>
		
   
		
  </div>
  </div>
  <!-- Normal Demo-->




  <?php 
  
  if(!$liste_event){?>
  <div class="notres">
  <h2 class="title_home" >Pas d'événement prévu pour ces filtres</h2>   
  
  </div>

  <?php } foreach($liste_event as $event){ ?>
  <div class="column mt-4">
    

   
    
    
 
    <!-- Post-->
    <div class="post-module">
      <!-- Thumbnail-->
      <div class="thumbnail">
        <div class="date">
          <div class="day"><?= date("d",strtotime($event->get("date")))?></div>
          <div class="month"><?= getmounth(date("m",strtotime($event->get("date"))))?></div>
        </div><?=$event->get("img") ?>
      </div>
      <!-- Post Content-->
      <div class="post-content">
        <div class="category"><?= $event->get("categorie")->get("categorie") ?></div>
        <h1 class="title"><?= $event->get("title") ?></h1>
        <div class="flex">
        <div class="col-4 flex al-c">
       <img src="img/picto/clockp.png" alt="clock">
              <span class="inf"><?= date("H:i",strtotime($event->get("time"))) ?></span>
            </div> 
              <div class="col-4 flex al-c">
              <img src="img/picto/calendarp.png" alt="calendar">
              <span class="inf"><?= date("d",strtotime($event->get("date")))?> <?= getmounth(date("m",strtotime($event->get("date"))))?></span>
              </div> 
              <div class="col-4 flex al-c">
              <img src="img/picto/placeholderp.png" alt="localisation">
                <span class="inf"><?= $event->get("location")->get("location") ?></span>
              </div> 
           

        </div>


        <div class="description mt-4">
      <?=  substr(strip_tags($event->get("description")), 0, 80). '...' ?><br>
        <a class="mt-2 more" id="eventdetaille<?=$event->get("id")?>" href="index.php?url=events-evenement-<?= $event->get('id')?>">En savoir plus <i class="fa fa-arrow-right"></i></a>
        </div>
        
        
      
      </div>
    </div>
  </div>

  <?php } ?>

  <!-- Hover Demo-->

 

</div>

<?php if($liste_event){ ?>
<div class="pt-5 pb-5">

<nav>
                    <ul class="pagination" style="justify-content: center;">
                        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="./?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                        </li>
                        <?php for($page = 1; $page <= $pages; $page++): ?>
                          <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                          <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                          <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                          <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                        </li>
                    </ul>
                </nav>

  </div>

  <?php }?>

