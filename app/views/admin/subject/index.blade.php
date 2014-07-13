@extends('layouts.admin')

@section('title') Subjects @stop

@section('content')

<div class="col-lg-10 col-lg-offset-1">

    <h1>
        <i class="fa fa-subject"></i> Subjects
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h1>

    {{ Breadcrumbs::render() }}

    <div class="table-responsive">
        <?php echo $subjects->links(); ?>
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $subject->id }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>
                        <a href="/admin/subject/{{ $subject->id }}/edit" class="btn btn-primary pull-left" style="margin-right: 3px;">Edit</a>
                        {{ Form::open(['url' => '/admin/subject/' . $subject->id, 'method' => 'DELETE']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <?php echo $subjects->links(); ?>
    </div>

    <a href="/admin" class="btn btn-primary">Back to Admin Home</a>
    <a href="/admin/subject/create" class="btn btn-success">Create Subject</a>

</div>

@stop