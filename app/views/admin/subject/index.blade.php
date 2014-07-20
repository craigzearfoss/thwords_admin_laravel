@extends('layouts.admin')

@section('title') Subjects @stop

@section('content')

<div class="col-lg-10 col-lg-offset-1">

    <h2>
        <i class="fa fa-subject"></i> Subjects
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h2>

    {{ Breadcrumbs::render() }}

    <div class="table-responsive">

        <?php echo $subjects->links(); ?>

        <br>
        {{ HTML::link('/admin', 'Back to Admin Home', array('class' => 'btn btn-primary')) }}
        {{ HTML::link('/admin/subject/create', 'Create a New Subject', array('class' => 'btn btn-success')) }}

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $subject->id }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->category }}</td>
                    <td>
                        {{ HTML::link('/admin/subject/'.$subject->id.'/edit', 'Edit', array('class' => 'btn btn-primary')) }}
                        <?php /*
                        {{ Form::open(['url' => '/admin/subject/' . $subject->id, 'method' => 'DELETE']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {{ Form::close() }}
                        */ ?>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <?php echo $subjects->links(); ?>
    </div>

    {{ HTML::link('/admin', 'Back to Admin Home', array('class' => 'btn btn-primary')) }}
    {{ HTML::link('/admin/subject/create', 'Create Subject', array('class' => 'btn btn-success pull-right')) }}

</div>

@stop