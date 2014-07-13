@extends('layouts.admin')

@section('title') Users @stop

@section('content')

<div class="col-lg-10 col-lg-offset-1">

    <h1>
        <i class="fa fa-user"></i> Users
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h1>

    {{ Breadcrumbs::render() }}

    <div class="table-responsive">
        <?php echo $users->links(); ?>
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Activated</th>
                    <th>Last Login</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->last_name }}, {{ $user->first_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->activated)
                            YES
                        @else
                            NO
                        @endif
                    </td>
                    <td>{{ $user->last_login }}</td>
                    <td>
                        {{ HTML::link('/admin/user/'.$user->id.'/edit', 'Edit', array('class' => 'btn btn-primary pull-left')) }}
                        {{ Form::open(['url' => '/admin/user/' . $user->id, 'method' => 'DELETE']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <?php echo $users->links(); ?>
    </div>

    {{ HTML::link('/admin', 'Back to Admin Home', array('class' => 'btn btn-primary')) }}
    {{ HTML::link('/admin/user/create', 'Create User', array('class' => 'btn btn-success pull-right')) }}

</div>

@stop