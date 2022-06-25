@extends("../../admin/home")
@section('admin')

<div class="container-fluid" style="margin-top:75px;">
      <div class="card  shadow" style="border-radius:2px;">
      <div class="card-body  d-flcex jusctify-content-center aligcn-items-center" >
            
        <div class="row">
              <div class="col-8 text-muted fw-bold "> 
               <span class="fs-2  fw-bold" style="color:var(--pink);"><i class="fas fa-calendar-alt fs-1 " style="color:var(--pink);"></i> Les types d' évènements </span>
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


@endsection