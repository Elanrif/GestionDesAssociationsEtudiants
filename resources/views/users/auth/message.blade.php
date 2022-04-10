@extends('layouts.app')

@section('content')

<div class="container-fluid px-5">
 
   <h3><button type="button" class="btn btn-primary position-relative">
  message
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
    {{ $comments->count() }}
    <span class="visually-hidden">unread messages</span>
  </span>
</button></h3>
<h4>
<div class="accordion accordion-flush" id="accordionFlushExample">
    @foreach ($comments as $comment )
        
    <div class="accordion-item">
        <h2 class="accordion-header" id="{{ $comment->id }}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Accordion Item #1
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="{{ $comment->id }}" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
        </div>
    </div>
    @endforeach
 
</div>
</h4>
</div>

@endsection