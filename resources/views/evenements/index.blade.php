

<div class="slider">
   
    <div class = "img__slider image active" >

<div class="card mb-3">
  <img src="{{ asset('images/association_default/DEVE-VE-Association_etudiantes.jpg') }}" class="card-img-top" alt="..." style="height:60vh;background:center/cover ;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
  </div>
</div>
    </div>

    @foreach ($associations as $association )
      

     <div class = "img__slider image" >

<div class="card mb-3">
 <img src="{{ asset('storage/'.$association->image) }}" alt = "don't exist" style="height:60vh;">
  <div class="card-body">
    <h5 class="card-title">{{ $association->nom }}</h5>
    <p class="card-text">{{ $association->description }}</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
  </div>
</div>
    </div>
    @endforeach
  
    <div class="suivant">
  <i class="fa-solid fa-circle-arrow-right"></i>
    </div>
    <div class="precedent">
        <i class="fa-solid fa-circle-arrow-left"></i>
    </div>
</div>