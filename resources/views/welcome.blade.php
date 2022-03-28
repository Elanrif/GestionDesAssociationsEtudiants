@extends('source.layout')
@section('content')
 
<!-- Test--> 


<!-- image avec linear gradient -->


<div class="linear container-fluid"> <!-- ici il y'a l'image en des etudiants voir liens CSS -->
  <div class="pt-2">
    <img src="{{asset('images/Université-Abdelmalek-Essaâdi.jpg')}}" > <!-- le logo de la FAC -->
  </div>

  <!-- pour le texte sur la photo --> 
  <div class="d-flex justify-content-center">
    <h2 class="text-center px-5 mx-5" style="padding-top:0px;color:var(--blanc--); font-size:80px;font-family: 'Lobster', cursive;">Les associations Etudiants de la Facultés Abdelmalek Essaâdi Tetouan</h2>
  </div>
  <!-- fin texte --> 
  
</div>
<!--
 -->


<!-- card en grande image en haut -->
<div class="card mb-3 container-fluid">
 
  <div class="card-body row row-cols-1 row-cols-md-3  g-4">
    <div class="col">
      <h5 class="card-title fs-3 fw-bold" style="color:var(--noir--);"> C'est quoi une association ? </h5> 
      <p class="card-text fs-5"> 
        Il s’agit d’une association <span class="text-primary"> loi 1901</span> . A l’instar des autres, elle ne cherche pas à réaliser des bénéfices. L’idée de <span class="text-primary"> créer un organisme associatif </span> vise à concrétiser un projet commun entre étudiants. Elle donne la possibilité à ces derniers de <span class="text-primary"> découvrir </span> de nouveaux aspects de <span class="text-primary"> la vie étudiante</span>.</p>
      </div>
      <div class="col">
       <h5 class="card-title fs-3 fw-bold" style="color:var(--noir--);"> A quoi servent les Associations Etudiants  ? </h5>
    <p class="card-text fs-5"> 
      Dans un premier temps, elles servent à réunir les étudiants autour d'une cause qui leur tient à cœur. En effet, vous allez rencontrer de nouvelles personnes qui ont des intérêts similaires aux vôtres. Dans cette ambiance, vous serez capable de construire un projet et de vous fixer des objectifs réalisables.</p>
    </div>
    <div class="col">
          <h5 class="card-title fs-3 fw-bold" style="color:var(--noir--);"> Pourquoi intégrer une association ? </h5>
    <p class="card-text fs-5"> 
      
      Faire partie d'une association étudiante vous donnera l'occasion de vivre une expérience enrichissante mais aussi d'ajouter une précieuse ligne à votre CV. On peut tout à fait considérer que certains postes associatifs sont aussi valorisants sur un CV qu’un stage.</p> 
    </div>
  </div>
</div>


  <!--DIFFÉRENTES TYPE ASSOCIATIONS--> 

  
  <!-- quelque example d'associations pour la page d'acceuil -->
  <h3 class="my-2 ps-4 ms-5" style="color:var(--noir--); font-size:30px;font-family: 'Lobster', cursive;padding-bottom:20px;"><i class="fa-brands fa-atlassian"></i> Les associations etudiantes  </h3>

 
  <div class="owen pb-5">
    <!-- includer l'associations --> 
 <!-- include('./associations/index') -->
  <!-- -->
</div>

<!-- -->

<!-- https://www.helloasso.com/blog/quel-evenement-associatif-creer/  ; c'est le site que j'ai copier le model-->

<div class="container-fluid">
  <div class="row row-cols-1 row-cols-lg-2">
    <div class="lineaire col-5"></div>
    <div class="col fs-3 pt-4" style="margin-top:70px;">
      <p class="pt-3 text-primary" style="padding-top:150px;color:var(--noir--); font-size:40px;font-family: 'Lobster', cursive;"><i class="fa-solid fa-calendar-week me-2 text-primary"></i>Les evenements associatifs  </p> 
      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic molestias rem tenetur explicabo quasi! Reprehenderit officia quasi amet eos veniam sapiente nemo voluptatum, necessitatibus nisi vitae odio reiciendis laudantium, soluta quos eaque nam fugit error odit, perspiciatis nulla iste deserunt maiores earum cupiditate? Provident aut praesentium exercitationem sapiente a rem autem minus illo reiciendis soluta mollitia, ad hic sint modi? Quos corrupti nostrum dignissimos asperiores eum fugit ut perspiciatis doloremque adipisci! Eveniet blanditiis tenetur sapiente .<br/>
    <a href="#" class="btn btn-primary col-4 text-light my-3 fs-4" style="border-radius:100% 0% 86% 14% / 21% 49% 51% 79%  ;"><i class="fa-solid fs-5 fa-square-plus fs-4 me-2" ></i>Savoir Plus</a></div>
       
 associations
  </div>
</div>

<div class="container-fluid my-3">
   <div class="row row-cols-1 row-cols-md-3 g-3">
     <div class="col">
       <p class="fs-3" style="font-family: 'Lobster', cursive;">Lorem ipsum dolor sit.</p>
       Lorem, ipsum dolor sit amet consectetur adipisicing elit. Labore perferendis mollitia, qui eaque est inventore, iure unde sed velit sint accusamus ad eligendi necessitatibus, voluptates suscipit itaque. Omnis vel reiciendis hic id in, quod asperiores magnam neque reprehenderit sapiente cumque cum! Totam quaerat doloremque dolore eos magni voluptas, tenetur autem quidem, saepe voluptatibus pariatur ducimus, odio praesentium. Quibusdam asperiores sapiente vero quam quia ducimus! Illo nulla culpa nisi sequi repudiandae asperiores, alias sint a reprehenderit ut ad doloribus quae, non quo corrupti, molestias harum voluptatem sunt autem facere assumenda doloremque dolores voluptate. Suscipit dolor, dolore rem vero fuga alias itaque esse sapiente modi numquam incidunt, veritatis consequatur dolores! Ipsum, ducimus tempore, vitae quasi nemo saepe, sint est corporis fugit nam rerum quae perspiciatis? Deserunt placeat voluptas officiis? Ex molestiae corrupti voluptatum consequatur eaque ipsum adipisci eligendi consequuntur accusantium rem saepe minus similique, ad est debitis earum enim quos perspiciatis officiis?</div>
     <div class="col">
       <p class="fs-3" style="font-family: 'Lobster', cursive;">consequuntur qui dolor, non pariatu.</p>
       Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore ex consectetur labore rerum asperiores porro, laboriosam cumque, aut ducimus aliquam ad rem cupiditate molestias ipsam maxime molestiae unde eos? Eligendi ipsam ex eaque ducimus soluta distinctio libero est, harum architecto corporis recusandae sit similique cum sint aliquid praesentium nemo at reiciendis magni alias, hic esse qui! Illum voluptatibus, labore error explicabo sunt, pariatur fuga sed eius impedit recusandae voluptas ratione minima? Incidunt numquam eaque consequatur debitis adipisci iure totam libero, animi deleniti mollitia labore quam voluptate asperiores hic repellat vero quaerat sint ab nesciunt aliquid assumenda neque reprehenderit, dolores veritatis! Eveniet, vero. Minima nesciunt vero quam sed tempora consequuntur qui dolor, non pariatur atque quia quis, placeat repellendus dolorum esse dolore sit molestiae commodi? Impedit debitis sequi quasi eligendi nesciunt soluta itaque praesentium distinctio accusamus beatae ad sint velit quo dolore eaque blanditiis, magni est quaerat quas vel fugit. Est.</div>
     <div class="col">
       <p class="fs-3" style="font-family: 'Lobster', cursive;">obcaecati dicta in.</p>
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea voluptates, perspiciatis molestiae ipsam ex officiis vitae reprehenderit mollitia delectus iusto, laboriosam ullam tempora error molestias neque iste fugit. Iste nostrum explicabo a obcaecati dicta in rem, at quas voluptatibus numquam? Pariatur voluptas odit iste error ratione temporibus sequi, ad culpa beatae nam. Tempora totam neque consequuntur, corporis ex beatae nulla facere vitae, autem tenetur ea soluta voluptas? In quam dolore expedita, exercitationem temporibus ad numquam odio nesciunt adipisci impedit consequatur fugit aliquam quia perferendis sit beatae! Enim officia totam, dolorum earum, amet numquam doloribus debitis molestiae voluptates in impedit, eos adipisci expedita nihil laborum libero facilis vel sit iure aliquam quasi itaque explicabo! Culpa quisquam doloribus et veritatis dolores veniam sit! Rerum esse similique assumenda quo quisquam, fugit nobis veniam? Provident veniam nam ratione temporibus. Cum, dolores? Pariatur qui, asperiores consequatur odio fugiat amet vitae, eligendi, veritatis molestiae quod quibusdam?</div>
     </div>
    </div>


@endsection