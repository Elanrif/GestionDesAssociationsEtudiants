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
    
       <h4 class="mt-5 ms-3" style="font-family:'Poppins', sans-serif;margin-bottom:5px; font-size:40px; font-weight:bold;">Tout savoir sur les Associations Etudiants <i class="fa-solid fa-lightbulb" style="color:rgb(229,82,33);"></i> .</h4>.
   
<!-- accordion -->
  <div class="accordion accordion-flush" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

     <div class="my-4" style="font-size:28px;color:rgb(229, 82, 33)">
    
     <hr class="fw-bold mb-5" style="height:5px;color:rgb(229, 82, 33);width:700px;">
     <i class="fa-solid fa-message" style="font-size:28px;color:rgb(229, 82, 33)"></i> <span class="text-dark fw-bold">C'est quoi une Association Étudiantes ?  </span>
    </div>

      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body fs-5">
         <ul>
         <li class ="my-3"> <span class="text-dark">   C’est une association qui est constituée d’étudiants. Le nombre peut varier selon les activités exercées par cette dernière. De plus, les étudiants proviennent de différents niveaux et de différentes filières. L’association peut exister à différentes échelles : école, université, ville, région, pays, continent et le monde. Il faut savoir qu’il existe plusieurs sortes d’associations pour les causes humanitaires, les enfants, l’éducation, le sport, la vie étudiante, le logement étudiant et bien d’autres.
           </span>
           </li>

             <li class ="my-3"> <span class="text-dark">Une asso étudiante te permet de faire tout un tas de rencontres et parfois même te constituer un bon groupe de potes si l’ambiance est vraiment cool ! Dans presque toutes les assos, tu pourras te rendre à des événements internes (uniquement entre membres d’une même asso) mais aussi des événements ouverts aux autres étudiants. Autant d’occasions de faire plein de belles rencontres !
           </span>
           </li>

             <li class ="my-3"> <span class="text-dark">  Dans toutes les associations, tu as des postes définis, souvent réunis au sein de ce qu’on appelle un « bureau d’asso« . Ce bureau comprend un président, un secrétaire général, un trésorier, avec éventuellement d’autres postes (c’est selon la taille et les besoins de l’asso) comme le poste de vice-président. Il peut aussi y avoir des statuts hors bureau comme des responsables de pôles. Ces pôles peuvent concerner des domaines différents : pôle partenariats, ou un pôle consacré à un événement régulier de l’asso (un festival pour une asso de théâtre par exemple).
           </span>
           </li>


          </ul>  
    
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
       
     <div class="my-4" style="font-size:28px;color:rgb(229, 82, 33)">
    
     
     <i class="fa-solid fa-message" style="font-size:28px;color:rgb(229, 82, 33)"></i> <span class="text-dark mb-5 fw-bold">À quoi servent les Associations etudiante ? </span>
  
   </div>

      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body fs-5">
       <ul>
         <li class ="my-3"> <span class="text-dark"> Dans un premier temps, elles servent à réunir les étudiants autour d'une cause qui leur tient à cœur. En effet, vous allez rencontrer de nouvelles personnes qui ont des intérêts similaires aux vôtres. Dans cette ambiance, vous serez capable de construire un projet et de vous fixer des objectifs réalisables.
           </span>
           </li>

            <li class ="my-3"> <span class="text-dark"> Ensuite, nous pouvons dire qu’elles permettent d’avoir un regard nouveau sur une activité ou une cause qui nous était encore inconnue. Vous allez être confronté à différents cas et différentes situations selon l’activité que vous pratiquez ou la cause que vous défendez. Si vous êtes dans une association d’aide humanitaire par exemple, vous serez en mesure de voir le monde sous un autre angle compte tenu des choses que vous allez découvrir et d’adapter le message que vous voulez transmettre.
           </span>
           </li>

            <li class ="my-3"> <span class="text-dark"> Elles nous permettent de nous dépasser car elles suscitent énormément d’implication. Grâce à la détermination et à l’esprit d’équipe, vous serez capable d’aller au-delà de vos objectifs et d’élever votre association à un statut plus élevé.
           </span>
           </li>

           <li class ="my-3"> <span class="text-dark"> Pour finir, elle vous donne la possibilité de vivre une expérience étudiante exceptionnelle qui vous offre des avantages tels que de nouvelles compétences et de nouveaux contacts. Avec l’association étudiante, vous aurez l’occasion de faire ce que vous aimez et de faire partager ce sentiment à autrui. C’est bénéfique pour tout le monde !
              Sachez que vous pouvez aussi créer votre propre association. Libérez votre créativité ! Et puis si vous aimez faire plusieurs choses/ la diversité, alors essayez le plus d’associations possibles.
           </span>
           </li>
          </ul> 
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
      <div class="accordion-body fs-5">
        <ul>
         <li class ="my-3"> <span class="text-dark">  
           <h3 class="fw-bold text-primary">Un « plus » sur le CV :</h3> Faire partie d'une association étudiante vous donnera l'occasion de vivre une expérience enrichissante mais aussi d'ajouter une précieuse ligne à votre CV. On peut tout à fait considérer que certains postes associatifs sont aussi valorisants sur un CV qu’un stage.Dans ce sens, l’expérience associative peut se révéler être une véritable expérience professionnelle.
           </span>
           </li>

           <li class ="my-3"> <span class="text-dark">  
           <h3 class="fw-bold text-primary">Une expérience humaine enrichissante :</h3>
           
           Appartenir à une association étudiante renforce les liens de solidarité en stimulant les sentiments d’appartenance à la communauté universitaire et à la société. Ces associations œuvrent dans des domaines aussi variés que l’animation du campus, la culture artistique, la culture scientifique et technique, l’environnement, l’humanitaire, la solidarité, la santé, le handicap, le sport, mais aussi la vie des filières <br><br>

           Intégrer une association étudiante sera une très bonne occasion de te changer les idées, et d’avoir quelque chose dans lequel t’investir en-dehors de tes cours, à la fois pour t’amuser et te faire des potes, et t’impliquer sérieusement dans des projets qui t’enthousiasment. <br><br>

           Comme par exemple ,  tu peux participer à plein d’événements organisés par les associations étudiantes, que tu en sois membre ou non d’ailleurs : pièces de théâtre, loisirs, événements sportifs, courses (athlétisme), et même des voyages…
           </span>
           </li>
          </ul>
  
      </div>
    </div>
     
  </div>
 <div class="accordion-item">
    <h2 class="accordion-header" id="headingfive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
       
     <div class="my-4" style="font-size:28px;color:rgb(229, 82, 33)">
    
     
     <i class="fa-solid fa-message" style="font-size:28px;color:rgb(229, 82, 33)"></i> <span class="text-dark mb-5 fw-bold">Les domaines d'Activités des Associations ? </span>
  
   </div>

      </button>
    </h2>
    <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body fs-5">
        <h4>Il y a une multitude de domaines d’activité associative.</h4>
       <ul class="nav">
         <li class ="my-3"> <span class="text-dark"> 👉🏻 Il y a les associations culturelles, qui ont des activités et des projets orientés vers l’art et la culture : troupes de théâtre, troupes de comédie musicale, Bureau des Arts, association de danse, de chant, de musique…Tu peux même trouver dans certaines écoles des associations orientées vers une culture étrangère
           </span>
           </li>

            <li class ="my-3"> <span class="text-dark"> 👉🏻 Il y a également les associations sportives, comme les assos de foot, de basketball, de rugby, de handball, de badminton…Parfois, ce ne sont pas des associations à proprement parler mais plutôt des équipes sportifs.
           </span>
           </li>

            <li class ="my-3"> <span class="text-dark"> 👉🏻 Il y a aussi, bien sûr, les associations chargées de la gestion de la vie étudiante, avec notamment le Bureau des élèves. Le BDE a pour rôle d’organiser la vie étudiante au sein de l’école, de réguler le système associatif, d’organiser les soirées, de s’occuper de l’accueil de nouveaux étudiants… Sans oublier le BDS, Bureau des sports, qui s’occupe de l’organisation d’événements sportifs avec les équipes sportives de l’école voire des équipes issues d’autres écoles.
           </span>
           </li>

           <li class ="my-3"> <span class="text-dark"> 👉🏻 Il existe parfois des associations qui touchent à la vie étudiante de façon plus spécifique, comme les assos vidéos qui se chargent de filmer les moments forts de la vie étudiante (surtout pendant les soirées…).
           </span>
           </li>

            <li class ="my-3"> <span class="text-dark"> 👉🏻 Certains étudiant s’intéressent aux assos plus professionnelles. Il y a notamment les Junior Entreprises, qui sont des associations à but non lucratif mais avec un but économique et pédagogique. 📊 Ces assos effectuent des travaux rémunérés pour des entreprises de tous secteurs. Il y a aussi des associations comme Enactus ou Le Noise, présentes dans de nombreux établissements d’enseignement supérieur, et qui a pour objectif de promouvoir l’entrepreneuriat social.
           </span>
           </li>

           
            <li class ="my-3"> <span class="text-dark">👉🏻 Tu trouveras sûrement des associations humanitaires dans ton école, avec dans chacune un projet humanitaire en France ou orienté vers un pays à l’étranger. Souvent ces associations organisent des événements sur le campus leur permettant de récolter de l’argent pour financer leurs projets humanitaires.
           </span>
           </li>

           
            <li class ="my-3"> <span class="text-dark">👉🏻 Il existe parfois des associations qui touchent à la vie étudiante de façon plus spécifique, comme les assos vidéos qui se chargent de filmer les moments forts de la vie étudiante (surtout pendant les soirées…).
           </span>
           </li>


          </ul> 
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingsix">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsefive">
       
     <div class="my-4" style="font-size:28px;color:rgb(229, 82, 33)">
    
     
     <i class="fa-solid fa-message" style="font-size:28px;color:rgb(229, 82, 33)"></i> <span class="text-dark mb-5 fw-bold">Le système des listes ? </span>
  
   </div>

      </button>
    </h2>
    <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body fs-5">
       
       <ul class="nav">
         <li class ="my-3"> <span class="text-dark"> Une liste d’association, c’est un ensemble d’étudiants travaillant ensemble en compétition contre d’autres groupes d’étudiants pour devenir une association sur le campus. Très souvent, l’élection du BDE se fait par un système de listes, où deux ou trois groupes d’étudiants sont en concurrence pour devenir le BDE de leur école. Ça peut fonctionner de la même manière parfois pour le BDA (Bureau des Arts), le BDS ou même parfois les Junior Entreprises (plus rare, quand même).
           </span>
           </li>

            <li class ="my-3"> <span class="text-dark"> Les affrontements de listes se font au cours de ce qu’on appelle une « campagne ». Une campagne dure plusieurs semaines voire plusieurs mois, et pendant cette campagne, les listes se confrontent avec pour objectif de paraître comme la liste la plus dynamique, la plus festive, celle qui organise le plus d’événements et qui est la plus efficace. A l’issue de cette campagne, les étudiants votent pour élire le nouveau BDE, ou le nouveau BDA, etc.
           </span>
           </li>

            <li class ="my-3"> <span class="text-dark"> Ce système de listes peut être très cool, parce que ça stimule la vie sur le campus : les listes, quand elles sont vraiment motivées, rivalisent avec des événements de grande ampleur, de grosses soirées, et se donnent à fond pour trouver de bons partenariats avec des entreprises et pouvoir faire des distributions de « goodies » par exemple…Les étudiants adorent !
           </span>
           </li>

           
          </ul> 
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingseven">
      <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseseven" aria-expanded="false" aria-controls="collapsefor">
       
     <div class="my-4" style="font-size:28px;color:rgb(229, 82, 33)">
    
    
     <i class="fa-solid fa-message" style="font-size:28px;color:rgb(229, 82, 33)"></i> <span class="text-dark mb-5 fw-bold">Comment choisir son association étudiante  ? </span>
  
   </div>

      </button>
    </h2>
    <div id="collapseseven" class="accordion-collapse collapse" aria-labelledby="headingfor" data-bs-parent="#accordionExample">
      <div class="accordion-body fs-5">
        <ul class="nav">
         <li class ="my-3"> <span class="text-dark">  
           <h3 class="fw-bold text-primary">Le domaine d’activité des associations :</h3> Bien sûr, la première chose à prendre en compte, c’est le domaine d’activité de l’asso. Celui-ci doit t’intéresser un minimum, sinon ça n’a aucun intérêt ! Choisis une asso qui te parle, ou un domaine dans lequel tu veux t’investir et qui peut t’apporter de l’expérience (par exemple, si tu veux travailler dans le développement durable plus tard, pourquoi ne pas tenter une association écolo comme le Noise ?) <br><br>

           Mais on te conseille de rester ouvert à des activités que tu n’as jamais expérimentées avant. Être en à l'Université , c’est aussi l’occasion de te découvrir une passion insoupçonnée pour une activité artistique à laquelle tu n’avais jamais pensée, ou un sport que tu n’avais jamais essayé auparavant. Il n’est jamais trop tard pour commencer de nouvelles choses !
           </span>
           </li>

           <li class ="my-3"> <span class="text-dark">  
           <h3 class="fw-bold text-primary">L’ambiance de l’association :</h3>
           
          Être dans une association étudiante, c’est aussi et surtout travailler en équipe et passer pas mal de temps avec le même groupe de personnes, potentiellement de futurs amis ! Il faut donc que tu prennes en compte l’état d’esprit de l’asso et vérifier qu’il te correspond bien avant de l’intégrer ✔ <br><br>

          Eh oui, tu peux très bien être passionné de sport et te rendre compte que l’association de sport n’a pas une ambiance qui te correspond, ou être un passionné de jeux vidéo et te rendre compte que tu préfères l’ambiance de l’association de théâtre. Pour faire les bons choix, je te conseille de te renseigner, de discuter avec d’autres étudiants et de te rendre à leurs événements pour te forger une opinion 👌

           </span>
           </li>
          </ul>
  
      </div>
    </div>
     
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingsevens">
      <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesevens" aria-expanded="false" aria-controls="collapsefor">
       
     <div class="my-4" style="font-size:28px;">
    
    
     <i class="fa-solid fa-message" style="font-size:28px;color:rgb(6, 6, 57)"></i> <span class="text-dark mb-5 fw-bold me-1"> Laisse nous un commentaire ! </span>
  
   </div>

      </button>
    </h2>
    <div id="collapsesevens" class="accordion-collapse collapse" aria-labelledby="headingfor" data-bs-parent="#accordionExample">
      <div class="accordion-body fs-5">
        <ul class="nav">
         <li class ="my-3"> <span class="text-dark">  
           <h4 class=" text-primary mb-5">Des questions ? Des bons plans à partager ? Nous validons ton commentaire et te répondons en quelques heures ! </h4> 
           
           <form action="#">
           <div class="form-floating border border-2 shadow">
             <textarea class="form-control" placeholder="Tapez quelque chose ici ..." id="floatingTextarea2" style="height: 200px "></textarea>
             <label for="floatingTextarea2">Comments</label>
           </div>
           <button type="submit" class= "btn btn-primary  mt-3 fw-bold">Envoyer</button>
           </form>

           </span>
           </li>

          </ul>
  
      </div>
    </div>
     
  </div>


   <hr class="fw-bold my-5" style="height:5px;color:rgb(229, 82, 33);width:700px;">

</div>
</div>
</div>
    <!-- fin --> 
    
<div class="container-fluid">
  
        <div class="card my-3 mx-5 px-5">
       <div class="card-img-top imgs mt-5 pt-5 mx-5 px-5 d-flex align-items-center justify-content-center">
       
        <p class="aa_lien px-5 mx-5 fs-5 text-white ">
          <span style="font-size:40px;font-weight:bold ;color:var(--bleu_ciel--);">Bureau Des Etudiants</span> <br>
          Le BDE, acronyme signifiant « Bureau des étudiants » est le relais entre les associations et l'administration au sein de notre Université Abdlemalek Essâadi . Nous avons la charge la redistribution des subventions associatives, défend les intérêts des différentes associations et des étudiants et les soutient dans leurs différents projets. <br>
          <a href="#" class="btn bureau mt-5 fw-bold btn  p-4">EN SAVOIR PLUS </a>
        </p>

      </div>
        
      </div>    
</div>

<div class="container-fluid py-4" style="background-color:var(--gold-crayola)">

<h4 style="margin:14px 400px ; font-size:70px;font-width:bold">Découvrir Toutes les Associations ! </h4>

<div class="card mb-3 rounded-2" style="margin:70px auto ;border: var(--gold-crayola); max-width: 940px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset("images/association_default/DEVE-VE-Association_etudiantes.jpg") }}" class="img-fluid rounded-start" alt="..." style="height:100%">
    </div>
    <div class="col-md-8"  style="font-size:30px; background-color:var(--gold-crayola)">
      <div class="card-body" >
        
        <p class="card-text fs-3 fw-bold">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <a class="btn fw-bold rounded-3 border border-dark">Savoir Plus</a>
        <a class="btn fw-bold rounded-4 border border-dark text-body">Suivre</a>
      </div>
    </div>
  </div>
</div>

<div class="card mb-3 rounded-2" style="margin: 70px auto ;border: var(--gold-crayola); max-width: 940px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset("images/association_default/DEVE-VE-Association_etudiantes.jpg") }}" class="img-fluid rounded-start" alt="..." style="height:100%">
    </div>
    <div class="col-md-8"  style="font-size:30px; background-color:var(--gold-crayola)">
      <div class="card-body">
        
        <p class="card-text fs-3 fw-bold">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <a class="btn fw-bold rounded-3 border border-dark">Savoir Plus</a>
        <a class="btn fw-bold rounded-4 border border-dark text-body">Suivre</a>
      </div>
    </div>
  </div>
</div>

<div class="card rounded-2" style="margin: 70px auto ;border: var(--gold-crayola); max-width: 940px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset("images/association_default/DEVE-VE-Association_etudiantes.jpg") }}" class="img-fluid rounded-start" alt="..." style="height:100%">
    </div>
    <div class="col-md-8"  style="font-size:30px; background-color:var(--gold-crayola)">
      <div class="card-body">
        
        <p class="card-text fw-bold fs-3">Lorem ipsum dolor sit, amet consectetur adipisicing..</p>
        <a class="btn fw-bold rounded-3 border border-dark">Savoir Plus</a>
        <a class="btn fw-bold rounded-4 border border-dark text-body">Suivre</a>
      </div>
    </div>
  </div>

</div>
 
</div>

   
  <!--DIFFÉRENTES TYPE ASSOCIATIONS--> 
  

</div>
<!-- https://www.helloasso.com/blog/quel-evenement-associatif-creer/  ; c'est le site que j'ai copier le model-->





@endsection