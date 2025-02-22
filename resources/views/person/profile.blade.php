@extends('layouts.app')

@section('content')
<main class="container">
    <h1>{{$faculty_name}}</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/profile">Profile</a></li>
            <li class="breadcrumb-item"><a href="/person/{{$person->batch_id}}">{{request()->route()->batch->batch}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$person->initial}}</li>
        </ol>
    </nav>
</main>

<div class="container pt-4">
   <div class="row gutters-sm ">
       <div class="col-md-4 mb-3">
           <div class="card">
               <div class="card-body">
                   <div class="d-flex flex-column align-items-center text-center">
                        <img src={{$person->image}} alt="{{"Profile Image: ".$person->username}}" style="border-radius: 10%" width="250">
                       <div class="mt-2">
                           <h4>{{$person->initial}}</h4>
                       </div>
                       <div class="mt-2">
                           <h4>{{$person->regNo}}</h4>
                       </div>
                   </div>
               </div>
           </div>
           <div class="mt-3">
               <div class="d-grid gap-2 col-6 mx-auto">
                <a href="{{URL::current()}}/verify" class="btn btn-primary" type="button">Verify</a>
                <a class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</a>
               </div>
           </div>
       </div>
       <div class="col-md-8">
           <div class="card mb-3">
               <div class="card-body">
                   <div class="row">
                       <div class="col-sm-3">
                            <span class="mb-0" style="font-weight: 500">First name</span>
                       </div>
                       <div class="col-sm-9 text-secondary">
                            {{$person->fname}}
                       </div>
                   </div>
                   <hr>
                   <div class="row">
                       <div class="col-sm-3">
                            <span class="mb-0" style="font-weight: 500">Last name</span>
                       </div>
                       <div class="col-sm-9 text-secondary">
                            {{$person->lname}}
                       </div>
                   </div>
                   <hr>
                   <div class="row">
                       <div class="col-sm-3">
                            <span class="mb-0" style="font-weight: 500">Full Name</span>
                       </div>
                       <div class="col-sm-9 text-secondary">
                            {{$person->fullname}}
                       </div>
                   </div>
                   <hr>
                   <div class="row">
                       <div class="col-sm-3">
                            <span class="mb-0" style="font-weight: 500">Name with initial</span>
                       </div>
                       <div class="col-sm-9 text-secondary">
                            {{$person->initial}}
                       </div>
                   </div>
                   <hr>
                   <div class="row">
                       <div class="col-sm-3">
                            <span class="mb-0" style="font-weight: 500">Address</span>
                       </div>
                       <div class="col-sm-9 text-secondary">
                            {{$person->address}}
                       </div>
                   </div>
                   <hr>
                   <div class="row">
                       <div class="col-sm-3">
                            <span class="mb-0" style="font-weight: 500">Birthday</span>
                       </div>
                       <div class="col-sm-9 text-secondary">
                            {{$person->date}}
                       </div>
                   </div>
                   <hr>
                   <div class="row">
                       <div class="col-sm-3">
                            <span class="mb-0" style="font-weight: 500">Faculty</span>
                       </div>
                       <div class="col-sm-9 text-secondary">
                            {{$person->faculty->name}}
                       </div>
                   </div>
                   <hr>
                   <div class="row">
                       <div class="col-sm-3">
                            <span class="mb-0" style="font-weight: 500">Department</span>
                       </div>
                       <div class="col-sm-9 text-secondary">
                            {{$person->department->name}}
                       </div>
                   </div>
                   <hr>
                   <div class="row">
                       <div class="col-sm-3">
                            <span class="mb-0" style="font-weight: 500">Username</span>
                       </div>
                       <div class="col-sm-9 text-secondary">
                            {{$person->username}}
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>

<!-- reject modal -->
<div class="modal fade" id="rejectModal" aria-labelledby="rejectModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rejectModalLabel">Entry Rejection Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true"></button>
      </div>
      <div class="modal-body">
        <p>Please indicate why are you rejecting the entry</p>
        <form action="{{URL::current()}}/reject" method="post" enctype="multipart/form-data">
            @csrf
            <div class="pt-1">
                <label for="keyerror" class="form-label">Key Error Type</label>
                <select id="keyerror" type="keyerror" class="form-select" name="keyerror">
                    <option value="Name Error">Name Error</option>
                    <option value="Wrong Picture">Wrong Picture</option>
                    <option value="User not found">User not found</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="pt-2">
                <label for="remarks" class="form-label">Remarks for user</label>
                <input type="text" class="form-control @error('remarks') is-invalid @enderror" placeholder="Some text here" name="remarks">
                @error('remarks')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- <button type="submit" class="btn btn-primary">Notify User</button> -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Notify User</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('footer')
  <div class="block">
  <div class="container" >
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <p class="col-md-4 mb-0 text-muted">© 2022 University of Peradeniya</p>

      <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Forum</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">People</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
      </ul>

    </footer>
  </div>
  </div>
@endsection