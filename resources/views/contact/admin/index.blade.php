@extends('admin/home')
@section('admin')

 <div class="container-fluid d-flex justify-content-center">
     <div class="w-50">
          <!-- pour s'être connecter --> 
    @if ($message = Session::get('usermessage'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
   <span class="fw-bold">{{ $message }}</span><strong class="fs-5"> <i class="fa-solid fa-face-grin-wide" style="color:rgb(255, 0, 157);"></i> </strong>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
    @endif
     </div>
 </div>

 <div class="container-fluid d-flex justify-content-center">
    <div style="min-width:100vh;min-height:40vh;margin-top:30px;margin-left:60px;margin-bottom:13vh;">
        
        <div class="row row-cols-1 gy-5">

            @foreach ($user_contacts as $contact ) <!-- J'AI COMMENCÉ dans la relation BELONGSTO --> 
              
         <form action="{{ route('contactuser.delete') }}" method = "post">
           @csrf 
             @method('DELETE')

            <div class="col">

                   <!-- ici puisque on va partir de la belongTo de la relation avec cardinalité 1:N ; on part de 1 donc PAS DE FOREACH-->
                <img class="pe-2 d-iline" src="{{ asset('storage/'.$contact->user->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;">
                
                <span class="fw-bold text-primary"> {{ $contact->user->nom }} {{ $contact->user->prenom }}</span> 
                

                  
                  <div class="fw-bold" style="margin-left:90px;">{{ $contact->message }} <span class="text-muted"> {{ $contact->created_at }} </span> </div>
             
                
                <div class="d-flex mt-3"> <!-- au lieu de faire que ici l'image de l'admin ; je peux laisser comme ça la personne connecté car il sera probablement l'admin --> 
                    <img class="ms-5 pe-2 d-iline" src="{{ asset('storage/'.auth()->user()->image) }}" alt="" style="border-radius:50%;height:50px; width:50px;">
                    <textarea type="text" class="form-control"  placeholder="Ajouter une réponse..." style="border-bottom-width:3px; border-style:solid;border-left-width:0px;border-right-width:0px;border-top-width:0px;width:70%;" rows="1"></textarea>

                

                    <span class="dropup">
                        <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fa-solid text-danger fs-3 fa-trash" style="cursor:grab;"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                          <li><a class="dropdown-item fw-bold text-danger" href="#">
                              <input type="text" class="visually-hidden" value="{{ $contact->id }}" name="message_id">
                              <button class="btn fw-bold text-danger" type="submit">supprimer</button></a></li>
                          
                        </ul>
                    </span>
                </div>
            </div>
            
        </form>
            @endforeach


        </div>

 
    </div>
</div>
@endsection