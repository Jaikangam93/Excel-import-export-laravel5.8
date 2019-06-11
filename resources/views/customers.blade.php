@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Customer </div>
                    <div class="col=lg-3">
                        <a href="{{ route('export')}}" class="btn btn-primary"> Export to XLSX </a> 
                    </div> 
                    <hr>
                        <form  method="POST" action="{{ route('import')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="import_file">
                            <br>
                            <input type="submit" value="Import" class="btn btn-success">

                        </form>

                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name </th>
                                <th scope="col">Email</th>
                                <th scope="col">Date </th>
                                <th scope="col">Password </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>{{ $user->certi_date}}</td>
                                    <td>{{ $user->password}}</td>
                                </tr>
                            @empty 
                                    <tr>
                                       <td colspam="2" class="text-center "> No users found  </td>
                                    </tr> 
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

