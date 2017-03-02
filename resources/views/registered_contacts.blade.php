@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @if(session('user_deleted'))
            <div class="alert alert-success">
                <strong>Success!</strong> You have successfully removed user.
            </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">All Registered Contacts</div>
                <div class="panel-body">

                    @if(count($contacts) > 0)
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-md-12">
                                 <a href="{{ url('/') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add Contact</a>
                            </div>
                        </div>

                        <ul class="list-group">
                            @include('list_header')
                            
                            @foreach($contacts as $contact)
                                <li class="list-group-item">
                                    <div class="row">
                                        <span class="col-md-3">{{ ucwords(strtolower($contact['name'])) }}</span>
                                        <span class="col-md-4">{{ strtolower($contact['email']) }}</span>
                                        <span class="col-md-3">{{ strtolower($contact['phone']) }}</span>
                                        <span class="col-md-2">
                                            <div class="btn-group">
                                                <a href="{{ url('/contact/edit/'.$contact['id']) }}" class="btn btn-success btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ url('/contact/delete/'.$contact['id']) }}" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </span>
                                    </div>
                                    
                                </li>
                            @endforeach
                        </ul>
                        <div>
                            <button class="btn btn-success">Export Contacts to Excel</button>
                        </div>
                    @else
                        <div class="text-center jumbotron">
                            <p>You dont have any users</p>

                            <a class="btn btn-primary" href="{{ url('/') }}">Add a User</a>
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>

@endsection
