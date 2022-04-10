@extends('source.layout')
@section('content')
 
<!-- image avec linear gradient -->
<!-- <div class="linear container-fluid"> // ici il y'a l'image en des etudiants voir liens CSS //
  <div class="pt-2">
    <img src="images/Université-Abdelmalek-Essaâdi.jpg" > // le logo de la FAC 
  </div>
//pour le texte sur la photo  
  <div class="d-flex justify-content-center">
    <h2 class="text-center px-5 mx-5" style="padding-top:0px;color:var(--blanc--); font-size:80px;font-family: 'Lobster', cursive;">Les associations Etudiants de la Facultés Abdelmalek Essaâdi Tetouan</h2>
  </div>
   fin texte --> 
  
</div>
<!-- Carousel image des associations -->
<div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
  <!-- indique les petits bar/tiréts en bas -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <!-- fin -->
  <div class="carousel-inner">
    <div class="img1 carousel-item active" data-bs-interval="120000" style="height:75vh;">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="fw-bold" style="padding-bottom:140px;"><a  href="#"> Les Associations Etudiants de L'université Abdelmalek Essâadi de Tétouan </a></h2>
        <p style="margin-left-right: 100px;font-size:18px;">
          Nous disposons de plusieurs associations qui sont a votre dispositions . Chaque associations est constituée des Membres du Bureau qui dirige l'association 
          
        </p>
      </div>
    </div>
    
    <div class="img2 carousel-item" data-bs-interval="7000" style="height:75vh;">
     
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="img3 carousel-item" data-bs-interval="7000" style="height:75vh;">
  
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon w-25" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- fin --> 


<div class="d-flex justify-content-center px-5 mx-5">
  <div class="row" style="margin:auto 200px;">
    <!-- en bas de carousel -->
    
       <h4 class="mt-5 ms-3" style="font-family:'Poppins', sans-serif;margin-bottom:5px; font-size:43px; font-weight:bold;">Ce que tu dois savoir sur les Associations Etudiants <i class="fa-solid fa-lightbulb" style="color:rgb(229,82,33);"></i> .</h4>.
   
<!-- accordion -->
  <div class="accordion accordion-flush" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

     <div class="my-4" style="font-size:28px;color:rgb(229, 82, 33)">
    
     <hr class="fw-bold mb-5" style="height:5px;color:rgb(229, 82, 33);width:700px;">
     <i class="fa-solid fa-message" style="font-size:28px;color:rgb(229, 82, 33)"></i> <span class="text-dark fw-bold">C'est quoi une Association ?  </span>
    </div>

      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body fs-5 fw-bold">
       Il s’agit d’une association loi 1901 . A l’instar des autres, elle ne cherche pas à réaliser des bénéfices. L’idée de créer un organisme associatif vise à concrétiser un projet commun entre étudiants. Elle donne la possibilité à ces derniers de découvrir de nouveaux aspects de la vie étudiante.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
       
     <div class="my-4" style="font-size:28px;color:rgb(229, 82, 33)">
    
     
     <i class="fa-solid fa-message" style="font-size:28px;color:rgb(229, 82, 33)"></i> <span class="text-dark mb-5 fw-bold">À quoi servent les Associations etudiantes ? </span>
  
   </div>

      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body fs-5 fw-bold">
        Dans un premier temps, elles servent à réunir les étudiants autour d'une cause qui leur tient à cœur. En effet, vous allez rencontrer de nouvelles personnes qui ont des intérêts similaires aux vôtres. Dans cette ambiance, vous serez capable de construire un projet et de vous fixer des objectifs réalisables.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingfor">
      <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefor" aria-expanded="false" aria-controls="collapsefor">
       
     <div class="my-4" style="font-size:28px;color:rgb(229, 82, 33)">
    
    
     <i class="fa-solid fa-message" style="font-size:28px;color:rgb(229, 82, 33)"></i> <span class="text-dark mb-5 fw-bold">Pourquoi intégrer une association ? </span>
  
   </div>

      </button>
    </h2>
    <div id="collapsefor" class="accordion-collapse collapse" aria-labelledby="headingfor" data-bs-parent="#accordionExample">
      <div class="accordion-body fs-5 fw-bold">
       Faire partie d'une association étudiante vous donnera l'occasion de vivre une expérience enrichissante mais aussi d'ajouter une précieuse ligne à votre CV. On peut tout à fait considérer que certains postes associatifs sont aussi valorisants sur un CV qu’un stage.
      </div>
    </div>
     <hr class="fw-bold my-5" style="height:5px;color:rgb(229, 82, 33);width:700px;">
  </div>

</div>
</div>
</div>
    <!-- fin --> 
    
<div class="container-fluid" style = "background:var(--bleu_ciel--);">
  
        <div class="card my-3 mx-5 px-5">
       <div class="card-img-top imgs mt-5 pt-5 mx-5 px-5 d-flex align-items-center justify-content-center">
       
        <p class="aa_lien px-5 mx-5 fs-5 text-white ">
          <span style="font-size:40px;font-weight:bold ;color:var(--bleu_ciel--);">Bureau Des Etudiants</span> <br>
          Le BDE, acronyme signifiant « Bureau des étudiants » est le relais entre les associations et l'administration au sein de notre Université Abdlemalek Essâadi . Nous avons la charge la redistribution des subventions associatives, défend les intérêts des différentes associations et des étudiants et les soutient dans leurs différents projets. <br>
          <a href="#" class="btn bureau mt-5 fw-bold btn  p-4">EN SAVOIR PLUS </a>
        </p>

      </div>
        <div class="a_lien card-body ms-2">
       <a href="#" class="btn bureau mt-3 ms-4 fw-bold btn  p-4"><i class="fa-solid fa-eye fs-4 me-2"></i> VOIR TOUES LES ASSOCIATIONS  </a>
        </div>
      </div>    
</div>

   
  <!--DIFFÉRENTES TYPE ASSOCIATIONS--> 
  

</div>
<!-- https://www.helloasso.com/blog/quel-evenement-associatif-creer/  ; c'est le site que j'ai copier le model-->





@endsection