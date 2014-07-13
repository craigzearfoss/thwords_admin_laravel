@extends('layouts.admin')

@section('title') Foreign Thwords @stop

@section('content')

<div class="col-lg-10 col-lg-offset-1">

    <h1>
        <i class="fa fa-subject"></i> Foreign Thwords
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
                </tr>
            </thead>

            <tbody>
            @foreach ($thwords as $thword)
                <tr>
                    <td>{{ $thword->id }}</td>
                    <td>{{ $thword->topic }}</td>
                    <td>
                        {{ HTML::link('/admin/foreign-thword/'.$thword->id.'/show', 'Show', array('class' => 'btn btn-primary')) }}
                        {{ HTML::link('/admin/foreign-thword/'.$thword->id.'/edit', 'Edit', array('class' => 'btn btn-primary')) }}
                        {{ Form::open(['url' => '/admin/foreign-thword/' . $thword->id, 'method' => 'DELETE']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <?php echo $thwords->links(); ?>
    </div>

    {{ HTML::link('/admin', 'Back to Admin Home', array('class' => 'btn btn-primary')) }}
    {{ HTML::link('/admin/foreign-thword/create', 'Create Foreign Thword', array('class' => 'btn btn-success pull-right')) }}

</div>

@stop