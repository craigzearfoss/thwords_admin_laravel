@extends('layouts.admin')

@section('title') Anti-Thwords @stop

@section('content')

<div class="col-lg-10 col-lg-offset-1">

    <h1>
        <i class="fa fa-subject"></i> Anti-Thwords
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h1>

    {{ Breadcrumbs::render() }}

    <div class="table-responsive">
        <?php echo $thwords->links(); ?>
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Topic</th>
                    <th>Description</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($thwords as $thword)
                <tr>
                    <td>{{ $thword->id }}</td>
                    <td>{{ $thword->topic }}</td>
                    <td>{{ $thword->description }}</td>
                    <td>
                        <a href="/admin/anti-thword/{{ $thword->id }}/edit" class="btn btn-primary pull-left" style="margin-right: 3px;">Edit</a>
                        {{ Form::open(['url' => '/admin/anti-thword/' . $thword->id, 'method' => 'DELETE']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <?php echo $thwords->links(); ?>
    </div>

    <a href="/admin" class="btn btn-primary">Back to Admin Home</a>
    <a href="/admin/anti-thword/create" class="btn btn-success">Create Anti-Thword</a>

</div>

@stop