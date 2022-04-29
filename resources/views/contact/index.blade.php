@extends('source.layout')

@section('content')

<div class="" style="height:8vh;"></div>
    <div class="container-fluid d-flex justify-content-center " style="min-height:0vh;">
    
  <div class="card mb-3">
  <div class="card-img-top" alt="...">
 <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d13754.467769705396!2d-5.369137194529603!3d35.56303050209915!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sma!4v1650722139891!5m2!1sfr!2sma" width="1000" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  <div class="card-body">
    <h2 style="color:brown; font-weight:bold">Coordonnées : </h2>

    <div class="row row-cols-1 row-cols-md-2">
        <div class="col">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <span class="nav-link fw-bold text-dark"><i class="fa-solid fs-3 fa-phone text-primary me-2"></i> (+212) 5 39 99 64 32</span>
                </li>
                <li class="nav-item">
                    <span class="nav-link fw-bold text-dark"><i class="fa-solid text-primary  fs-3 fa-location-dot me-2"></i>Avenue de Sebta, Mhannech II
            93002 - Tétouan - Maroc </span>
                </li>
            </ul>
        </div>
         <div class="col">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <span class="nav-link fw-bold text-dark"> <i class="fas text-primary fa-envelope fs-3 me-2"></i>  fs.tetouan.contact@gmail.com  </span>
                </li>
                <li class="nav-item">
                    <span class="nav-link fw-bold text-dark"> <i class="fas fa-tty me-2 text-primary fs-3"></i> (+212) 5 39 99 45 00</span>
                </li>
            </ul>
        </div>
    </div>
  </div>
</div>
 </div>
<!-- saisie de formulaire --> 

@guest
    
   <form action="{{ route('guest.contact') }}" method="post"> <!-- autre formulaire pour des invités --> 
     @csrf

 <div class="container-fluid d-flex justify-content-center">
     <div class="card" style="width:68%;min-height:50vh;">
         <div class="card-body mt-4">
             <div class="row">
                 <div class="col-md-4 col-12">
                     
                    <div class="mb-4">
                         <label for="exampleFo" class="form-label fw-bold"><span class="me-1" style="color:rgb(187, 18, 18);">*</span>Nom et Prenom</label>
                         <input type="text" class="form-control" id="exampleFo" placeholder="Saisir votre nom et prenom" name="nom" required>
                       </div>

                 </div>
                      <div class="col-md-4 col-12">
                     
                    <div class="mb-4">
                         <label for="exampleFos" class="form-label fw-bold"><span style="color:rgb(187, 18, 18);" class="me-1">*</span>Télephone</label>
                         <input type="numeric" class="form-control" id="exampleFos" placeholder="saisir votre Numéro Tel" name="num_tel" required>
                       </div>

                 </div>
                 <div class="col-md-4 col-12">

                    <div class="mb-4">
                         <label for="exampleFor" class="form-label fw-bold"><span style="color:rgb(187, 18, 18);" class="me-1">*</span>E-mail</label>
                         <input type="email" class="form-control" id="exampleFor" placeholder="nom@example.com" required name="email">
                       </div>

                 </div>
                 <div class="col-12">
                     <div class="form-floating">
                        <textarea class="form-control mb-4" placeholder="Leave a comment here" id="floatingTextarea" style="height:20vh;" required name="message"></textarea>
                        <label for="floatingTextarea">écrire quelque chose ...</label>
                        </div>
                 </div>
               
             </div>

             <div class="d-flex" style="justify-content:space-between">
                 <p class="fw-bold"> <span style="color:rgb(187, 18, 18);">*</span> champs obligatoire</p>
                 
                 <button class="btn text-end btn-outline-success fw-bold">Envoyer mon message </button>
             </div>
         </div>
     </div>
 </div>
 <div style="height:10vh;"></div> <!-- juste pour l'espacement --> 

   </form>
 @endguest


 @auth <!-- si la personne est connecté --> 

 @if(auth()->user()->role == "admin") <!-- si c'est l'admin --> 
 
  <form action="{{ route('auth.contact') }}" method="post"> <!-- autre formulaire -->
     @csrf
 <div class="container-fluid d-flex justify-content-center">
     <div class="card" style="width:68%;min-height:50vh;">
         <div class="card-body mt-4">

            <p class="text-desabled text-center" style="margin-top:12px;min-height:13vh;text-decoration:line-through"><span class="fw-bold fs-1 text-muted"> Envoyer votre message ! </span> </p>
             <div class="row">
                 
                 <div class="col-md-4 col-12 visually-hidden "> <!-- je cache ces champs -->
                     
                    <div class="mb-4">
                         <label for="exampleFo" class="form-label fw-bold"><span class="me-1" style="color:rgb(187, 18, 18);">*</span>id_utilisateur connecté</label> <!-- je prends la personne connecté --> 
                         <input type="text" class="form-control" id="exampleFo" placeholder="Saisir votre nom et prenom" value="{{ auth()->user()->id }}" name = "user_id">
                       </div>

                 </div>
           
                 <!-- pour l'envoie du message -->
                 <div class="col-12">
                     <div class="form-floating">
                        <textarea class="form-control is-invalid mb-1" placeholder="Leave a comment here" id="floatingTextarea" style="height:20vh;" required name="message"></textarea>
                            <div id="floatingTextareaFeedfdback" class="invalid-feedback fw-bold mb-3">
                         l'admin ne peut pas envoyer un message à lui même !.
                  </div>
                        <label for="floatingTextarea">écrire quelque chose ...</label>
                        </div>
                 </div>
               
             </div>

             <div class="d-flex" style="justify-content:space-between">
                 <p class="fw-bold"> <span style="color:rgb(187, 18, 18);">*</span> champs obligatoire</p>
        <!-- seulement faire type button -->
                 <button type = "button" class="btn text-end btn-outline-success fw-bold">Envoyer mon message </button>
             </div>
         </div>
     </div>
 </div>
 <div style="height:10vh;"></div> <!-- juste pour l'espacement --> 
</form>

 @else  <!-- sinon pour un simple utilisateur --> 

  <form action="{{ route('auth.contact') }}" method="post"> <!-- autre formulaire -->
     @csrf
 <div class="container-fluid d-flex justify-content-center">
     <div class="card" style="width:68%;min-height:50vh;">
         <div class="card-body mt-4">

            <p class="fs-1 fw-bold text-center" style="margin-top:12px;min-height:13vh;">Envoyer votre message ! </p>
             <div class="row">
                 
                 <div class="col-md-4 col-12 visually-hidden "> <!-- je cache ces champs -->
                     
                    <div class="mb-4">
                         <label for="exampleFo" class="form-label fw-bold"><span class="me-1" style="color:rgb(187, 18, 18);">*</span>id_utilisateur connecté</label> <!-- je prends la personne connecté --> 
                         <input type="text" class="form-control" id="exampleFo" placeholder="Saisir votre nom et prenom" value="{{ auth()->user()->id }}" name = "user_id">
                       </div>

                 </div>
           
                 <!-- pour l'envoie du message -->
                 <div class="col-12">
                     <div class="form-floating">
                        <textarea class="form-control mb-4" placeholder="Leave a comment here" id="floatingTextarea" style="height:20vh;" required name="message"></textarea>
                     
                        <label for="floatingTextarea">écrire quelque chose ...</label>
                        </div>
                 </div>
               
             </div>

             <div class="d-flex" style="justify-content:space-between">
                 <p class="fw-bold"> <span style="color:rgb(187, 18, 18);">*</span> champs obligatoire</p>    
       
                 <button type = "submit" class="btn text-end btn-outline-success fw-bold">Envoyer mon message </button>
             </div>
         </div>
     </div>
 </div>
 <div style="height:10vh;"></div> <!-- juste pour l'espacement --> 
</form>
    @endif
 @endauth

 
@endsection