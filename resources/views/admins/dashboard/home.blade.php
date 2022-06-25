@extends('admin/home')
@section('admin')

<div class="container d-flex justify-content-center align-items-center mt-5" >
  <div style="max-width:600px;">
     <!-- pour s'être déconnecter --> 
    @if ($message = Session::get('login'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif
  </div>
</div>


<div class="container-fluid">
          <div class="row row-cols-1 row-cols-md-3 gx-5 gy-3  mx-4">
            <a href="{{ route('admin-users') }}" class="nav-link">
  <div class="col">
    <div class="card h-100 shadow" style="border-radius:30px;">
      <div class="card-body  d-flex justify-content-center align-items-center" >
            
        <div class="row">
            <div class="col text-muted fw-bold "> 
               <span class="fs-2 text-black fw-bold">{{ $use }}</span> utilisateurs
            </div>
            <div class="col fs-3 fw-bold pt-3 ps-3"> <i class="fas fs-1 fa-users" style="color:var(--pink);"></i> </div>
        </div>          
      </div>
    </div>
  </div>
  </a>
  <a href="{{ route('admin.commentaire') }}" class="nav-link">
  <div class="col">
    <div class="card h-100 shadow" style="border-radius:30px;">
      <div class="card-body  d-flex justify-content-center align-items-center" >
            
        <div class="row">
            <div class="col text-muted fw-bold "> 
               <span class="fs-2 text-black fw-bold">{{ $comment }}</span> commentaires
            </div>
            <div class="col fs-3 fw-bold pt-3 ps-3"> <i class="fas fa-comment-alt fs-1 " style="color:var(--pink);"></i> </div>
        </div>          
      </div>
    </div>
  </div>
 </a>
 <a href="{{ route('admin.contact') }}" class="nav-link">
  <div class="col">
    <div class="card h-100 shadow" style="border-radius:30px;">
      <div class="card-body  d-flex justify-content-center align-items-center" >
            
        <div class="row">
            <div class="col text-muted fw-bold "> 
               <span class="fs-2 text-black fw-bold">{{ $messa }}</span> Messages
            </div>
            <div class="col fs-3 fw-bold pt-3 ps-3"> <i class="fas fa-comments fs-1 " style="color:var(--pink);"></i> </div>
        </div>          
      </div>
    </div>
  </div>
 </a>
  <a href="{{ url('admin-asso') }}" class="nav-link">
  <div class="col">
    <div class="card h-100 shadow" style="border-radius:30px;">
      <div class="card-body  d-flex justify-content-center align-items-center" >
            
        <div class="row">
            <div class="col text-muted fw-bold "> 
               <span class="fs-2 text-black fw-bold"> {{ $asso }}</span> Associations
            </div>
            <div class="col fs-3 fw-bold pt-3 ps-3"> <i class="fas fa-layer-group fs-1 " style="color:var(--pink);"></i> </div>
        </div>          
      </div>
    </div>
  </div>
 </a>
  <a href="{{ url('admin-evenement') }}" class="nav-link">
  <div class="col">
    <div class="card h-100 shadow" style="border-radius:30px;">
      <div class="card-body  d-flex justify-content-center align-items-center" >
            
        <div class="row">
            <div class="col text-muted fw-bold "> 
               <span class="fs-2 text-black fw-bold">{{ $event }}</span> Évènements
            </div>
            <div class="col fs-3 fw-bold pt-3 ps-3"> <i class="fas fa-calendar-alt fs-1 " style="color:var(--pink);"></i> </div>
        </div>          
      </div>
    </div>
  </div>
 </a>


</div>

          <!-- deuxième partie --> 
 <div class="row mx-4 g-2 mt-3">
     <div class="col">
    <div class="card  shadow" style="border-radius:2px;">
      <div class="card-body  d-flcex jusctify-content-center aligcn-items-center" >
            
        <div class="row">
              <div class="col-8 text-muted fw-bold "> 
               <span class="fs-2  fw-bold" style="color:var(--pink);"><i class="fas fa-calendar-alt fs-1 " style="color:var(--pink);"></i> Les évènements </span>
            </div>
            <div class="col fs-3 fw-bold pt-3 ps-3"> <i class="ffas fs-1 fa-users" style="color:var(--pink);"></i> </div>
            <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col" class="text-primary">#</th>
      <th scope="col" class="text-primary">Types > évènements</th>
      <th scope="col" class="text-primary">Dates > évènements</th>
      <th scope="col" class="text-primary">Option</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($evenements as $evenement )
        
    <tr>
        <th scope="row" >{{ $loop->index }}</th>
        <td class="fw-bold">{{ $evenement->type }}</td>
        <td class="fw-bold"> {{ $evenement->created_at}}</td>
        <td>voir</td>
    </tr>
   
    @endforeach
  </tbody>
</table>

        </div>          
      </div>
    </div>
  </div>

      <div class="col-4">
    <div class="card h-100 shadow" style="border-radius:2px;">
      <div class="card-body  d-flcex justifyx-content-center align-itfems-center" >
            
        <div class="row">
            <div class="col-8 text-muted fw-bold "> 
               <span class="fs-2 text-black fw-bold">{{ $use }} utilisateurs</span> 
            </div> 
            <div class="col fs-3 fw-bold pt-3 ps-3"> <i class="fas fs-1 fa-users" style="color:var(--pink);"></i> </div>
        </div> 
        <hr>
              {{ $users->links() }}
        <hr>      
        @foreach ($users as $user )
             <div class="py-0">   
                <a href="#" class="nav-link"> 
            <img class="pe-2 d-iline" src="{{ asset('storage/'.$user->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;"> 
                <span class="fw-bold text-primary"> {{ $user->prenom }} <span class="text-muted">{{ $user->created_at }}</span>      
          </div>
          </a>
        @endforeach
  

     
      </div>
    </div>
  </div>
    
 </div>
</div>
@endsection