@extends('layouts.app')

@section('content')

     <h5 class="text-center">
          <a href="/admin/messeges"> Messeges Page </a>
          -
          <a href="/admin/projects"> Projects Page </a>
     </h5>


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
