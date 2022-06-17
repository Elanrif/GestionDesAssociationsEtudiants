@extends('source.layout')
@section('content')


<!-- Carousel image des associations -->
<div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
  <!-- indique les petits bar/tiréts en bas -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    @foreach ($evenements as $evenement )

    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to ="{{ $loop->index +1 }}" aria-label ="Slide {{ $loop->index + 2 }}"></button>
      
    @endforeach
   <!--  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
  </div>
  <!-- fin -->
  <div class="carousel-inner">
    <div class="img1 carousel-item active" data-bs-interval="5000" style="height:75vh;">
      <a href="#carousel">
      <div class="carousel-caption d-none d-md-block">
        <h2 class="fw-bold" style="padding-bottom:140px;font-size:40px;"> Les Associations Etudiants de L'université Abdelmalek Essâadi de Tétouan </h2>
        <p style="margin-left-right: 100px;font-size:18px;">
          
          Nous disposons de plusieurs associations qui sont a votre dispositions . Chaque associations est constituée des Membres du Bureau qui dirige l'association 
          
        </p>
      </div>
    </a>
    </div>
    
    @foreach ($evenements as $evenement )
      
      <div class="carousel-item">
        <!-- par défaut le lien est $association->id mais vu que je suis dans les évenements je dois passer par une methode pour trouver cette association -->
        <a href="{{ route('user.association',$evenement->association->id).'#event/'.$evenement->id }}">
      <div class="img-fluid rounded-start" alt="..." style="height:75vh;background:linear-gradient(rgba(0, 0, 0, 0.1),var(--pink)) ,url({{ asset('storage/'.$evenement->image) }}) center / cover no-repeat  ;"  data-bs-interval="3000" ></div>

      <div class="carousel-caption d-none d-md-block">
        <h1 class="fw-bold" style="margin-bottom:100px;font-size:40px;">Évènement > {{ $evenement->type }} 
         </h1>
          
         <ul class="nav flex-column text-start fs-4 text-black fw-bold">
            <li class="nav-item text-black fw-bold">
            <i class="fa-solid fa-calendar me-2 text-black"></i>  Date >  <span class="text-light">{{ $evenement->date }} 
</span>            </li>
            <li>
             <i class="fa-solid fa-clock me-2 text-black"></i> Heure >  <span class="text-light"> {{ $evenement->heure }}</span>
            </li>
            <li>
             <i class="fa-solid fa-location-dot me-2 text-black"></i>  Lieu >  <span class="text-light">{{ $evenement->lieu }}
 </span>           </li>
       
          </ul>
      

               <p class="fw-bold fs-3 text-center">
          <ul class="nav text-end">
            
            <li class="nav-item">
               {{  $evenement->description }}
            </li>
          </ul>
            
         </p>
          
      </div>

      </a>
    </div>

    @endforeach
  
    
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


<div class="container-fluid justify-content-center d-flex">
  <div class="w-75">
    <h4 id = "ancre" class="mt-5" style="font-family:'Poppins', sans-serif;margin-bottom:5px; font-size:40px; font-weight:bold;">Tout savoir sur les Associations Etudiants <i class="fa-solid fa-lightbulb" style="color:var(--pink);"></i> .</h4>
   
    <!-- debut accordion -->

  <div class="accordion accordion-flush" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

     <div class="my-4" style="font-size:28px;color:var(--pink)">
    
     <hr class="fw-bold mb-5" style="height:5px;color:var(--pink);width:400px;">
     <i class="fa-solid fa-message" style="font-size:28px;color:var(--pink)"></i> <span class="text-dark fw-bold">C'est quoi une Association Étudiantes ?  </span>
    </div>

      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" >
      <div class="accordion-body fs-5">
         <ul class="nav">
         <li class ="my-3"> <span class="text-dark"> 👌  C’est <span class="text-primary fw-bold"> une association  </span> qui est constituée d’étudiants. Le nombre peut varier selon les activités exercées par cette dernière. De plus, les étudiants proviennent de différents niveaux et de différentes filières. L’association peut exister à différentes échelles : école, université, ville, région, pays, continent et le monde. Il faut savoir qu’il existe <span class="text-primary fw-bold"> plusieurs sortes d’associations </span>  pour les causes humanitaires, les enfants, l’éducation, le sport, la vie étudiante, le logement étudiant et bien d’autres.
           </span>
           </li>

             <li class ="my-3"> <span class="text-dark">👌 Une <span class="text-primary fw-bold"> asso étudiante  </span> te permet de faire tout un tas de rencontres et parfois même te constituer un bon groupe de potes si l’ambiance est vraiment cool ! Dans presque toutes les assos, tu pourras te rendre à <span class="text-primary fw-bold"> des événements </span>  internes (uniquement entre membres d’une même asso) mais aussi des événements ouverts aux autres étudiants. Autant d’occasions de faire plein de <span class="text-primary fw-bold"> belles rencontres ! </span> 
           </span>
           </li>

             <li class ="my-3"> <span class="text-dark">👌  Dans toutes les <span class="text-primary fw-bold"> associations </span> , tu as des postes définis, souvent réunis au sein de ce qu’on appelle un <span class="text-dark fw-bold"> « bureau d’asso« </span>  . Ce bureau comprend <span class="text-dark fw-bold">un président, un secrétaire général, un trésorier,</span> avec éventuellement d’autres postes (c’est selon la taille et les besoins de l’asso) comme le poste de vice-président. Il peut aussi y avoir des statuts hors bureau comme des responsables de pôles. Ces pôles peuvent concerner des domaines différents : pôle partenariats, ou un pôle consacré à un événement régulier de l’asso (un festival pour une asso de théâtre par exemple).
           </span>
           </li>


          </ul>  
    
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
       
     <div class="my-4" style="font-size:28px;color:var(--pink)">
    
     
     <i class="fa-solid fa-message" style="font-size:28px;color:var(--pink)"></i> <span class="text-dark mb-5 fw-bold">À quoi servent les Associations etudiante ? </span>
  
   </div>

      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" >
      <div class="accordion-body fs-5">
       <ul class="nav">
         <li class ="my-3"> <span class="text-dark"> Dans un premier temps, elles servent à <span class="text-dark fw-bold">réunir les étudiants</span> autour d'une cause qui leur tient à cœur. En effet, vous allez <span class="fw-bold text-dark">rencontrer de nouvelles personnes</span> qui ont des intérêts similaires aux vôtres. Dans cette ambiance, vous serez capable de construire un projet et de vous fixer des objectifs réalisables.
           </span>
           </li>

            <li class ="my-3"> <span class="text-dark"> Ensuite, nous pouvons dire qu’elles <span class="text-dark fw-bold">permettent d’avoir un regard nouveau</span> sur une activité ou une cause qui nous était encore inconnue. Vous allez <span class="text-primary fw-bold"> être confronté à différents cas et différentes situations</span> selon l’activité que vous pratiquez ou la cause que vous défendez. Si vous êtes dans une <span class="text-primary fw-bold">association</span> d’aide humanitaire par exemple, vous serez en mesure de voir le monde sous un autre angle compte tenu des choses que vous allez découvrir et d’adapter le message que vous voulez transmettre.
           </span>
           </li>

            <li class ="my-3"> <span class="text-dark"> Elles nous permettent de nous dépasser car <span class="text-dark fw-bold"> elles suscitent énormément d’implication</span>. Grâce à la détermination et à l’esprit d’équipe, vous serez capable d’aller au-delà de vos objectifs et d’élever votre association à un statut plus élevé.
           </span>
           </li>

           <li class ="my-3"> <span class="text-dark"> Pour finir, elle vous donne la possibilité de vivre une expérience étudiante exceptionnelle qui vous offre des avantages tels que de <span class="text-dark fw-bold">nouvelles compétences et de nouveaux contacts</span>. Avec l’association étudiante, vous aurez l’occasion de faire ce que vous aimez et de faire partager ce sentiment à autrui <span class="text-primary fw-bold"> C’est bénéfique pour tout le monde !</span> 
              Sachez que vous pouvez aussi créer votre propre association. Libérez votre créativité ! Et puis si vous aimez faire plusieurs choses/ la diversité, alors essayez le plus d’associations possibles.
           </span>
           </li>
          </ul> 
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingeight">
      <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseeight" aria-expanded="false" aria-controls="collapsefor">
       
     <div class="my-4" style="font-size:28px;color:var(--pink)">
    
    
     <i class="fa-solid fa-message" style="font-size:28px;color:var(--pink)"></i> <span class="text-dark mb-5 fw-bold">Les postes existantes dans les associations étudiantes ? </span>
  
   </div>

      </button>
    </h2>
    <div id="collapseeight" class="accordion-collapse collapse" aria-labelledby="headingeight" >
      <div class="accordion-body fs-5">
        <ul class="nav">
         <li class ="my-3"> <span class="text-dark">  
           <h3 class="fw-bold text-primary">« Président »</h3> Il y a d’abord le président, qui s’occupe en général de tout ce qui relève de l’administration, mais pas que ! Il donne la ligne directrice de l’asso, tranche dans les débats et dans les grandes prises de décision. C’est un poste avec de grandes responsabilités et très formateur  <br><br>

           Dans certains bureaux, il y a le poste de <span class="text-dark fw-bold">vice-président</span>  , qui est en général le “couteau suisse” du président. Autrement dit, il est là pour soutenir le président et l’aider dans les tâches importantes qu’il n’a pas le temps de faire. Il est là pour prendre le relais en cas d’absence prolongée du président.
           </span>
           </li>

           <li class ="my-3"> <span class="text-dark">  
           <h3 class="fw-bold text-primary">« Trésorier »</h3>
           
           Il y a ensuite le trésorier : c’est le magicien de la comptabilité ! 💰 Il gère les dépenses, trouve des solutions pour faire gagner de l’argent à l’association, choisit les tarifs lorsque l’asso vend des produits (ou autres) aux étudiants, de sorte à tirer un certain bénéfice à réinvestir dans les autres projets de l’asso.

           </span>
           </li>

            <li class ="my-3"> <span class="text-dark">  
           <h3 class="fw-bold text-primary">« Secrétaire Général »</h3>
           
       Le secrétaire général, enfin, est la personne chargée de la communication avec l’extérieur (ça peut être l’administration, les entreprises partenaires…) et avec les autres membres de l’asso. Il est là pour tenir au courant des décisions prises par le bureau et aussi pour organiser les réunions (les assemblées générales).
           
           </span>
           </li>
          </ul>
  
      </div>
    </div>
     
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingfor">
      <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefor" aria-expanded="false" aria-controls="collapsefor">
       
     <div class="my-4" style="font-size:28px;color:var(--pink)">
    
    
     <i class="fa-solid fa-message" style="font-size:28px;color:var(--pink)"></i> <span class="text-dark mb-5 fw-bold">Pourquoi intégrer une association ? </span>
  
   </div>

      </button>
    </h2>
    <div id="collapsefor" class="accordion-collapse collapse" aria-labelledby="headingfor" >
      <div class="accordion-body fs-5">
        <ul class="nav">
         <li class ="my-3"> <span class="text-dark">  
           <h3 class="fw-bold text-primary">Un « plus » sur le CV :</h3> Faire partie d'une <span class="text-primary fw-bold">  association étudiante</span> vous donnera l'occasion de vivre une expérience enrichissante mais aussi d'ajouter une précieuse ligne à votre <span class="text-primary fw-bold">CV </span> . On peut tout à fait considérer que <span class="text-dark fw-bold"> certains postes associatifs </span>  sont aussi valorisants sur un CV qu’un stage.Dans ce sens, l’expérience associative peut se révéler être une véritable <span class="text-dark fw-bold">expérience professionnelle</span>.
           </span>
           </li>

           <li class ="my-3"> <span class="text-dark">  
           <h3 class="fw-bold text-primary">Une expérience humaine enrichissante :</h3>
           
           Appartenir à une association étudiante renforce les liens de solidarité en stimulant les sentiments d’appartenance à <span class="text-primary fw-bold"> la communauté universitaire </span>   et à la société. Ces associations œuvrent dans des <span class="text-primary fw-bold"> domaines</span> aussi variés que <span class="text-dark fw-bold"> l’animation du campus </span>, <span class="text-dark fw-bold"> la culture artistique </span>, <span class="text-dark fw-bold">la culture scientifique et technique</span> , <span class="text-dark fw-bold">l’environnement</span>, <span class="text-dark fw-bold">l’humanitaire</span>, <span class="text-dark fw-bold">la solidarité</span>,<span class="text-dark fw-bold"> la santé</span>, <span class="text-dark fw-bold">le handicap</span>, <span class="text-dark fw-bold">le sport</span>, mais aussi <span class="text-dark fw-bold">la vie des filières</span> <br><br>

            <span class="text-dark fw-bold">Intégrer une association étudiante</span> sera une très bonne occasion de te changer les idées, et d’avoir quelque chose dans lequel t’investir en-dehors de tes cours, à la fois pour t’amuser et te faire des potes, et t’impliquer sérieusement dans des projets qui t’enthousiasment. <br><br>

           Comme par exemple ,  tu peux <span class="text-dark fw-bold">participer à plein d’événements</span>  organisés par les associations étudiantes, que tu en sois membre ou non d’ailleurs : pièces de théâtre, loisirs, événements sportifs, courses (athlétisme), et même des voyages…
           </span>
           </li>
          </ul>
  
      </div>
    </div>
     
  </div>
 <div class="accordion-item">
    <h2 class="accordion-header" id="headingfive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
       
     <div class="my-4" style="font-size:28px;color:var(--pink)">
    
     
     <i class="fa-solid fa-message" style="font-size:28px;color:var(--pink)"></i> <span class="text-dark mb-5 fw-bold">Les domaines d'Activités des Associations ? </span>
  
   </div>

      </button>
    </h2>
    <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingThree" >
      <div class="accordion-body fs-5">
        <h4>Il y a une multitude de domaines d’activité associative.</h4>
       <ul class="nav">
         <li class ="my-3"> <span class="text-dark"> 👉🏻 Il y a <span class="text-dark fw-bold">les associations culturelles</span>, qui ont des activités et des projets orientés vers l’art et la culture : troupes de théâtre, troupes de comédie musicale, Bureau des Arts, association de danse, de chant, de musique…Tu peux même trouver dans certaines écoles des associations orientées vers une culture étrangère
           </span>
           </li>

            <li class ="my-3"> <span class="text-dark"> 👉🏻 Il y a également <span class="text-dark fw-bold">les associations sportives</span>, comme les assos de foot, de basketball, de rugby, de handball, de badminton…Parfois, ce ne sont pas des associations à proprement parler mais plutôt des équipes sportifs.
           </span>
           </li>

            <li class ="my-3"> <span class="text-dark"> 👉🏻 Il y a aussi, bien sûr, <span class="text-dark fw-bold">les associations chargées de la gestion de la vie étudiante</span>, avec notamment le Bureau des élèves. Le <span class="text-primary fw-bold">BDE </span>a pour rôle d’organiser la vie étudiante au sein de l’école, de réguler le système associatif, d’organiser les soirées, de s’occuper de l’accueil de nouveaux étudiants… Sans oublier le BDS, Bureau des sports, qui s’occupe de l’organisation d’événements sportifs avec les équipes sportives de l’école voire des équipes issues d’autres écoles.
           </span>
           </li>

           <li class ="my-3"> <span class="text-dark"> 👉🏻 Il existe parfois des associations qui touchent à la vie étudiante de façon plus spécifique, comme <span class="text-primary fw-bold">les assos vidéos</span> qui se chargent de filmer les moments forts de la vie étudiante (surtout pendant les soirées…).
           </span>
           </li>

            <li class ="my-3"> <span class="text-dark"> 👉🏻 Certains étudiant s’intéressent aux <span class="text-dark fw-bold">assos plus professionnelles </span>. Il y a notamment les Junior Entreprises, qui sont des associations à but non lucratif mais avec un but économique et pédagogique. 📊 Ces assos effectuent des travaux rémunérés pour des entreprises de tous secteurs. Il y a aussi des associations comme Enactus ou Le Noise, présentes dans de nombreux établissements d’enseignement supérieur, et qui a pour objectif de promouvoir l’entrepreneuriat social.
           </span>
           </li>

           
            <li class ="my-3"> <span class="text-dark">👉🏻 Tu trouveras sûrement <span class="text-primary fw-bold">des associations humanitaires</span> , avec dans chacune un projet humanitaire en France ou orienté vers un pays à l’étranger. Souvent <span class="text-dark fw-bold">ces associations organisent des événements</span> sur le campus leur permettant de récolter de l’argent pour financer leurs projets humanitaires.
           </span>
           </li>


          </ul> 
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingsix">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsefive">
       
     <div class="my-4" style="font-size:28px;color:var(--pink)">
    
     
     <i class="fa-solid fa-message" style="font-size:28px;color:var(--pink)"></i> <span class="text-dark mb-5 fw-bold">Le système des listes ? </span>
  
   </div>

      </button>
    </h2>
    <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingThree" >
      <div class="accordion-body fs-5">
       
       <ul class="nav">
         <li class ="my-3"> <span class="text-dark"> Une <span class="text-dark fw-bold">liste d’association</span>, c’est un ensemble d’étudiants travaillant ensemble en compétition contre d’autres groupes d’étudiants pour devenir une association sur le campus. Très souvent, <span class="text-dark fw-bold">l’élection du BDE</span> se fait par un <span class="text-dark fw-bold">système de listes</span>, où deux ou trois groupes d’étudiants sont <span class="text-primary fw-bold">en concurrence pour devenir le BDE</span> de leur école. Ça peut fonctionner de la même manière parfois pour le BDA (Bureau des Arts), le BDS ou même parfois les Junior Entreprises (plus rare, quand même).
           </span>
           </li>

            <li class ="my-3"> <span class="text-dark"> Les affrontements de listes se font au cours de ce qu’on appelle <span class="text-dark fw-bold">une « campagne »</span>. Une campagne dure plusieurs semaines voire plusieurs mois, et pendant cette campagne, les listes se confrontent avec pour objectif de <span class="text-dark fw-bold">paraître</span> comme la liste <span class="text-dark fw-bold">la plus dynamique</span>, la plus festive, celle qui organise le plus d’événements et qui est la plus efficace. A l’issue de cette campagne, <span class="text-dark fw-bold">les étudiants votent pour élire le nouveau BDE</span>, ou le nouveau BDA, etc.
           </span>
           </li>

            <li class ="my-3"> <span class="text-dark"> Ce système de listes peut être très cool, parce que ça <span class="text-dark fw-bold">stimule la vie sur le campus</span> : les listes, quand elles sont vraiment motivées, rivalisent avec <span class="text-dark fw-bold">des événements de grande ampleur</span>, de grosses soirées, et se donnent à fond pour trouver de bons partenariats avec des entreprises et pouvoir faire des distributions de « goodies » par exemple…Les étudiants adorent !
           </span>
           </li>

           
          </ul> 
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingseven">
      <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseseven" aria-expanded="false" aria-controls="collapsefor">
       
     <div class="my-4" style="font-size:28px;color:var(--pink)">
    
    
     <i class="fa-solid fa-message" style="font-size:28px;color:var(--pink)"></i> <span class="text-dark mb-5 fw-bold">Comment choisir son association étudiante  ? </span>
  
   </div>

      </button>
    </h2>
    <div id="collapseseven" class="accordion-collapse collapse" aria-labelledby="headingfor" >
      <div class="accordion-body fs-5">
        <ul class="nav">
         <li class ="my-3"> <span class="text-dark">  
           <h3 class="fw-bold text-primary">Le domaine d’activité des associations :</h3> Bien sûr, la première chose à prendre en compte, c’est <span class="text-primary fw-bold">le domaine d’activité de l’asso</span>. Celui-ci doit t’intéresser un minimum, sinon ça n’a aucun intérêt ! <span class="text-dark fw-bold">Choisis une asso qui te parle</span>, ou un domaine dans lequel tu veux t’investir et qui peut t’apporter de l’expérience (par exemple, si tu veux travailler dans le développement durable plus tard, pourquoi ne pas tenter une association écolo comme le Noise ?) <br><br>

           Mais on te conseille de rester ouvert à des activités que tu n’as jamais expérimentées avant. Être  à l'Université , c’est aussi l’occasion de te découvrir une passion insoupçonnée pour une activité artistique à laquelle tu n’avais jamais pensée, ou un sport que tu n’avais jamais essayé auparavant. <span style="font-weight:100;font-style:italic">Il n’est jamais trop tard pour commencer de nouvelles choses</span> !
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



   <hr class="fw-bold my-5" style="height:5px;color:var(--pink);width:400px;">

</div><!-- fin accordion --> 


  </div>
</div>


    <!-- fin --> 
    
<!-- debut des associatoins --> 

<div id="associations" class="container-fluid py-4" style="background-color:var(--gold-crayola)">

  
<h4  class="text-center px-5"  id ="carousel" style="font-size:70px;font-width:bold">Découvrir Toutes les Associations ! </h4>

@foreach ($associations as $association )
  

<div class="card mb-3 rounded-2 decouvrir-asso" style="transition:0.6s ease-in-out ; margin:70px auto ;border: var(--gold-crayola); max-width: 940px;">
  <div class="row g-0">
    <div class="col-md-4">
      <div class="img-fluid rounded-start" alt="..." style="height:100%;background:linear-gradient(rgba(0, 0, 0, 0.1),var(--pink)) ,url({{ asset('storage/'.$association->image) }}) center / cover no-repeat  ;"></div>
    </div>
    <div class="col-md-8"  style="font-size:30px; background-color:var(--gold-crayola)">
      <div class="card-body" >
        
        <p class="card-text fs-1 fw-bold">Association {{ $association->nom }}</p>
        <p class="card-text fs-3 fw-bold">Crée le {{ $association->date }}</p>
        <!-- overflow:hidden pour cacher le depassage ; aussi on doit faire le height --> 
        <p class="card-text fs-3 fw-bold" style="height:40px;overflow:hidden">{{ $association->description }}</p> 
        <a href = "{{ route('user.association',$association->id) }}" class="btn savoir-hover px-3 fs-5" style="box-shadow:0 3px 2px 2px rgb(9, 5, 94);">Savoir Plus</a>
        
      </div>
    </div>
  </div>
</div>

@endforeach
 
</div>

   
  <!--DIFFÉRENTES TYPE ASSOCIATIONS--> 
  

</div>
<!-- https://www.helloasso.com/blog/quel-evenement-associatif-creer/  ; c'est le site que j'ai copier le model-->

<!-- Début des Evènements  @include('evenements.index')-->

<div id="eventss" class="fw-bold fs-2 text-center my-5" style="color:var(--blue)"> <i class="fa-solid fa-calendar-days"></i> Les Évènements Etudiantes  de la faculté Abdelmalek Essâadi Tetouan </div>
 
<div class="container-fluid d-flex justfy-content-center" style="background-color: rgb(104, 5, 72);">
   
    <div class="row row-cols-1 row-cols-md-3 pb-5 g-4" style="margin:0 120px;">
 
    @foreach ($evenements as $evenement ) <!-- ici j'ai les evenements --> 
      
    <div class="col pb-5"> 
      <div class="card  eventhoover" style="transition:1s ease-in-out;"> <!-- 2s c'est mieux -->
        <div class="card-img-top" alt="..."  style="height:20vh; background: linear-gradient(rgba(38, 35, 66, 0.5),#0e0324) , url({{ asset('storage/'.$evenement->image) }} ) center / cover no-repeat  ;"></div>
        <div class="card-body">
          <h5 class="card-title fw-bold ms-3" style="color:var(--pink)"> {{ $evenement->type }}</h5>
          <p class="card-text">
            <ul class="nav suivre flex-column">
              <a  class="nav-link my-2 fw-bold"> <span style="color:var(--blue)"> <i class="fa-solid fa-calendar"></i> Date : </span> {{ $evenement->date }}</a>
              <a  class="nav-link my-2 fw-bold"><span style="color:var(--blue)"> <i class="fa-solid fa-clock"></i> Heure : </span> {{ $evenement->heure }}</a>
              <a  class="nav-link my-2  fw-bold"><span style="color:var(--blue)"> <i class="fa-solid fa-location-dot"></i> Lieu : </span>  {{ $evenement->lieu }}</a>
            </ul>
          </p>
        </div>
        
        @auth <!-- personne doit être connecté pour voir -->
        <div class="d-flex ms-3 mb-3">
          <!-- le boutton savoir plus --> 
         <a href="{{ route('user.association',$evenement->association->id) }}" class="nav-link"><button type="submit" href="#" class="btn border border-black fw-bold nav-evenement">savoir Plus</button></a>
         @if(auth()->user()->participe($evenement)) <!-- une methode que je vais créer sur le model user , toujours et je recupere directement l'evenement concerné puisque je suis dedans -->   
      <!-- pour supprimer la participation -->
      <form action="{{ route('deleteParticipe')}}" method = "post">
      @csrf
      @method('DELETE')
      <input type="text" class="visually-hidden" name="evenement_id" value={{ $evenement->id }}><!-- je prends la ligne id de chaque evenement -->
      <input type="text" class="visually-hidden" name="user_id" value={{ auth()->user()->id }}><!-- et l' utilisateur connecté -->
       <a href="#" class="nav-link"><button type="submit" href="#" class="btn border border-black fw-bold" style="color:var(--pink)">Participé(e)</button></a>
     </form>
       
       @else <!-- sinon -->

     <form action="{{ route('participe')}}" method = "post">
      @csrf
      <input type="text" class="visually-hidden" name="evenement_id" value={{ $evenement->id }}><!-- je prends la ligne id de chaque evenement -->
      <input type="text" class="visually-hidden" name="user_id" value={{ auth()->user()->id }}><!-- et l' utilisateur connecté -->
       <a href="#" class="nav-link"><button type="submit" href="#" class="btn border border-black fw-bold text-dark">Participer</button></a>
     </form>
    @endif <!-- fin de condition -->


    @if(auth()->user()->like($evenement))
     <!--pour les likes --> 

      <form action="{{  route('deleteLike') }}" method="post">
        @csrf
        @method('DELETE')
        
        <input type="text" class="visually-hidden" name="evenement_id" value={{ $evenement->id }}><!-- je prends la ligne id de chaque evenement -->
      <input type="text" class="visually-hidden" name="user_id" value={{ auth()->user()->id }}><!-- et l' utilisateur connecté -->

        <a href="#" class="nav-link">
         <button type="submit" class="btn position-relative nav-liens   border border-black fw-bold">
           <i class="fa-solid  fa-thumbs-up"></i>
           <span class="position-absolute top-1  start-100 translate-middle badge rounded-pill bg-danger">
            {{ $evenement->user_s->count() }} <!-- pour le model Like -->
             <span class="visually-hidden">unread messages</span>
               </span>
              </button>

         </a>
     </form>

     

     @else 
        <form action="{{ route('like') }}" method ="post"> <!-- pour liker un evenement-->
          @csrf

          <input type="text" class="visually-hidden" name="evenement_id" value={{ $evenement->id }}><!-- je prends la ligne id de chaque evenement -->
      <input type="text" class="visually-hidden" name="user_id" value={{ auth()->user()->id }}><!-- et l' utilisateur connecté -->

          <a href="#" class="nav-link ">
        <button type="submit" class="btn position-relative nav-lien mx-1 border border-black fw-bold">
           <i class="fa-solid  fa-thumbs-up"></i> 
           <span class="position-absolute top-1  start-100 translate-middle badge rounded-pill bg-danger">
             <!-- a partir de evenent j'accede a la relation manytomany et je prends le count --> 
              {{ $evenement->user_s->count() }}
            
         <span class="visually-hidden">unread messages</span>
          </span>
        </button>
        </a>
      </form>

     @endif <!-- fin pour le like -->

    </div>
    @endauth

            @guest<!-- pour un simple utilisateur -->
        <div class="d-flex ms-4 mb-3">  <!-- ici dans le lien j'aimerais aller a l'association puis vers la place de l'evenement --> 
          <!-- puisque je recupere l'evenent il suffit de passer par la relation qu'il y'a entre les deux et ..-->  

  <!-- donc puisque je veux l'association->id il suffit de passer par la méthode pour trouver cette association-->        
 <a href="{{ route('user.association',$evenement->association->id) }}" class="nav-link fs-5"><button type="submit" href="#" class="btn border border-black fw-bold nav-evenement">savoir Plus</button></a>
                      <!-- Modal pour la personne qui veut suivre mais est un invité -->
<div class="modal fade" id="guest" tabindex="-1" aria-labelledby="exampleModalLabeler" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger fw-bold" id="exampleModalLabeler"><i class="fa-solid text-danger fw-bold fa-triangle-exclamation"></i> À savoir  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fs-5 text-dark">
       Vous devez vous <a style="text-decoration:none;" href="{{ route('register') }}">inscrire</a>  ou  <a style="text-decoration:none;" href="{{ route('login') }}">vous connecter</a> pour pouvoir <span class="fw-bold" style="color:var(--pink)">participer</span> à cette évènement ! 
      </div>
      <div class="modal-footer">
       <a href="{{ route('register') }}"> <button type="button" class="btn btn-outline-primary fw-bold" data-bs-dismiss="modal">S'inscire</button> </a>
       <a href="{{ route('login') }}"><button type="submit" class="btn btn-outline-success fw-bold">Se connecter</button> </a> 
      </div>
    </div>
  </div>
</div>


                     <!-- Modal pour la personne qui veut suivre mais est un invité -->
<div class="modal fade" id="like" tabindex="-1" aria-labelledby="exampleModalLabeler" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger fw-bold" id="exampleModalLabeler"><i class="fa-solid text-danger fw-bold fa-triangle-exclamation"></i> À savoir  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fs-5 text-dark">
       Vous devez vous <a style="text-decoration:none;" href="{{ route('register') }}">inscrire</a>  ou  <a style="text-decoration:none;" href="{{ route('login') }}">vous connecter</a> pour laisser un <span class="text-primary fw-bold"> &nbsp; <i class="fa-solid nav-liens fa-thumbs-up"></i>&nbsp; </span> à cette évènement ! 
      </div>
      <div class="modal-footer">
       <a href="{{ route('register') }}"> <button type="button" class="btn btn-outline-primary fw-bold" data-bs-dismiss="modal">S'inscire</button> </a>
       <a href="{{ route('login') }}"><button type="submit" class="btn btn-outline-success fw-bold">Se connecter</button> </a> 
      </div>
    </div>
  </div>
</div>
      <!-- pour supprimer la participation -->
      <form action="#" method = "post">
      @csrf
      @method('DELETE')
   
    
     <form action="#" method = "post">
      @csrf
      
       <a class="nav-link"><button data-bs-toggle="modal" data-bs-target="#guest" type="button" href="#" class="btn border border-black  fw-bold nav-lien">Participer</button></a>
     </form>
 
     <!--pour les likes --> 

        <form action="#" method ="post"> <!-- pour liker un evenement-->
          @csrf

          <a  class="nav-link ">
        <button type="button" data-bs-toggle="modal" data-bs-target="#like" class="btn position-relative nav-lien  border border-black fw-bold">
           <i class="fa-solid  fa-thumbs-up"></i> 
           <span class="position-absolute top-1  start-100 translate-middle badge rounded-pill bg-danger">
             <!-- a partir de evenent j'accede a la relation manytomany et je prends le count --> 
              {{ $evenement->users->count() }}
            
         <span class="visually-hidden">unread messages</span>
          </span>
        </button>
        </a>
      </form>

    </div>
    @endguest

      </div>
    </div>

    @endforeach
</div>

</div>
     </div>
  </div>




@endsection