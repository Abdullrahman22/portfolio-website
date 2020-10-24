@extends('layouts.app')

@section('content')

     <!------------ Navbar -------------->
     <nav class="navbar navbar-expand-lg admin-navbar navbar-light bg-light">
          <div class="container">
               <a class="navbar-brand" href="/">Home Page</a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
          
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                         <li class="nav-item">
                              <a class="nav-link" href="/admin/messeges">Messeges</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="/admin/projects">Projects</a>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>



     <div class="messege-page">
          
          <h1 class="text-center" style="margin-top: 100px">  <i class="fas fa-comment-alt"></i> Messege Page  </h1>
          <div class="container">
               <div class="table-responsive">
                    <table class="table table-striped">
                         <thead>
                              <tr>
                                   <th scope="col">#id</th>
                                   <th scope="col"> <i class="fas fa-user"></i> Name </th>
                                   <th scope="col"> <i class="fas fa-comment-alt"></i>  Messege </th>
                                   <th scope="col"> <i class="fas fa-envelope"></i> Email</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach ($messeges as $messege)
                                   <tr>
                                        <th scope="row"> {{ $messege->id }} </th>
                                        <th scope="row"> {{ $messege->body }} </th>
                                        <th scope="row"> {{ $messege->name }} </th>
                                        <th scope="row"> {{ $messege->email }} </th>
                                   </tr>
                              @endforeach
                         </tbody>
                    </table>
               </div>
          </div>

     </div>

@endsection
