@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Active users list with austrian citizenship (order by created latest)
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if(session()->get('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}  
                                </div>
                            @endif
                            @if(session()->get('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}  
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">id</th>
                                            <th scope="col">email</th>
                                            <th scope="col">full name</th>
                                            <th scope="col">phone number</th>
                                            <th scope="col">citizenship</th>
                                            <th scope="col">status</th>
                                            <th scope="col">created at</th>
                                            <th scope="col">options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <th scope="row">{{$user->id}}</th>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                    @if($user->userDetail)  
                                                        {{$user->userDetail->first_name}} {{$user->userDetail->last_name}}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->userDetail)  
                                                        {{$user->userDetail->phone_number}}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->userDetail) 
                                                        {{$user->userDetail->country->name}}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->active)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>{{$user->created_at->diffForHumans()}}</td>
                                                <td class="d-flex">
                                                    @if($user->userDetail) 
                                                        <a href="{{ route('user.edit', $user->id) }}" type="button" class="btn btn-outline-info">edit</a>
                                                    @else    
                                                        <form action="{{ route('user.delete',$user->id) }}" method="POST" class="ml-1">                               
                                                            @csrf
                                                            @method('DELETE')
                                            
                                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection