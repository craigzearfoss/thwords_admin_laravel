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
                    <th>Lang</th>
                    <th>Topic</th>
                    <th>Description</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($thwords as $thword)
                <tr>
                    <td>{{ $thword->id }}</td>
                    <td>{{ $thword->lang }}</td>
                    <td>{{ str_replace('|', ', ', $thword->topic) }}</td>
                    <td>{{ $thword->description }}</td>
                    <td>
                        {{ HTML::link('/admin/anti-thword/'.$thword->id.'/show', 'Show', array('class' => 'btn btn-primary')) }}
                        {{ HTML::link('/admin/anti-thword/'.$thword->id.'/edit', 'Edit', array('class' => 'btn btn-primary')) }}
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

    {{ HTML::link('/admin', 'Back to Admin Home', array('class' => 'btn btn-primary')) }}
    {{ HTML::link('/admin/anti-thword/create', 'Create Anti-Thword', array('class' => 'btn btn-success pull-right')) }}

</div>

@stop