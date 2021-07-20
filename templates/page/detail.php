<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">





<div class="container pt-5">
	<div class="row mb-5">
		<div class="col-md-8 order">
			<div class="row">
				<div class="col-md-12 mb-4 img">
					<?= $event->get("img") ?>
				</div>

                <div class="col-md-12 mb-4">
                
					<p><?= $event->get("description") ?></p>
				</div>
                
				
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<h1><?= $event->get("title") ?></h1>
					
					<ul class="list-group list-group-flush mb-2">
						<li class="list-group-item pl-0 pr-0 pt-2 pb-2">Categorie: <a href="categories.php?categorie=<?=$event->get("categorie")->get("id") ?>"><?= $event->get("categorie")->get("categorie") ?></a></li>
						<li class="list-group-item pl-0 pr-0 pt-2 pb-2"><svg id="Capa_1"  fill="#00B3BA"  viewBox="0 0 443.294 443.294"  xmlns="http://www.w3.org/2000/svg"><path d="m221.647 0c-122.214 0-221.647 99.433-221.647 221.647s99.433 221.647 221.647 221.647 221.647-99.433 221.647-221.647-99.433-221.647-221.647-221.647zm0 415.588c-106.941 0-193.941-87-193.941-193.941s87-193.941 193.941-193.941 193.941 87 193.941 193.941-87 193.941-193.941 193.941z"/><path d="m235.5 83.118h-27.706v144.265l87.176 87.176 19.589-19.589-79.059-79.059z"/></svg>
              <span class="inf"><?= date("H:i",strtotime($event->get("time"))) ?></span></li>
						<li class="list-group-item pl-0 pr-0 pt-2 pb-2"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
              <span class="inf"><?= date("d",strtotime($event->get("date")))?> <?= getmounth(date("m",strtotime($event->get("date"))))?></span></li>
						<li class="list-group-item pl-0 pr-0 pt-2 pb-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                <span class="inf"><?= $event->get("location")->get("location") ?></span></li>
					
					</ul>
				
				</div>
			</div>

            
            
		</div>
        
</div>
	
	
	</div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>