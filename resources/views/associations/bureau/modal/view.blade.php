
<div class="ms-2">
    
    <!-- on doit avoir plusieur modal de suppression dans chaque membre du bureau --> 
    <button  type="button" data-bs-toggle="modal" data-bs-target="#membreBureau{{ $loop->index }}" class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></button>
    
    
    <!-- Modal -->
    <div class="modal fade" id="membreBureau{{ $loop->index }}" tabindex="-1" aria-labelledby="exampleModalLabeler" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary fw-bold" id="exampleModalLabeler"><i class="fa-solid fa-eye"></i> visualiser </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
      <div class="modal-body fw-bold">

            <div class="card shadow h-100 admin-assohover "  style="transition:0.6s ease-in-out;"> 
          <img src="{{ asset("storage/".$bureau->image) }}" class="card-img-top" alt="..." style="margin-left:150px; margin-top:10px;width:120px;border-radius:70% ;height:20vh;">
          <div class="card-body">
            
           <div class="text-center">
               <h4 class="card-title mt-3 text-primary fw-bold fw-3">{{ $bureau->Poste }} </h4>
              <h5 class="card-title mt-2 text-dark fw-bold">{{ $bureau->nom }} {{ $bureau->prenom }}</h5>
           </div>
              <p class="card-text">
                  <ul class="nav flex-column">
                      
                          <a href="#" class="nav-link text-dark fw-bold"> <i class="fa-solid fa-envelope me-2"></i>{{ $bureau->email }}</a>
                          <a href="#" class="nav-link text-dark fw-bold">  <i class="fa-solid fa-mobile me-2"></i>{{ $bureau->Tel }}</a>
                          <a href="#" class="nav-link text-dark fw-bold"> <i class="fa-solid fa-graduation-cap me-2"></i>{{ $bureau->filiere }}</a>
                      
                  </ul>
                
                </p>

            </div>
        </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary fw-bold px-3" data-bs-dismiss="modal">Fermer</button>
            
        </div>
    </div>
</div>
</div> <!-- fin modal pour la suppression -->

</div>        
