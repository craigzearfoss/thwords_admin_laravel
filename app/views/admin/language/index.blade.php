@extends('layouts.admin')

@section('title') Languages @stop

@section('content')

<div class="col-lg-10 col-lg-offset-1">

    <h1>
        <i class="fa fa-language"></i> Languages
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h1>

    {{ Breadcrumbs::render() }}

    <div class="table-responsive">
        <?php echo $languages->links(); ?>
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code 1</th>
                    <th>Code 2</th>
                    <th>Spoken In</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($languages as $language)
                <tr>
                    <td>{{ $language->id }}</td>
                    <td>{{ $language->name }}</td>
                    <td>{{ $language->code1 }}</td>
                    <td>{{ $language->code2 }}</td>
                    <td>{{ $language->spoken_in }}</td>
                    <td>
                        <a href="/admin/language/{{ $language->id }}/edit" class="btn btn-primary pull-left" style="margin-right: 3px;">Edit</a>
                        {{ Form::open(['url' => '/admin/language/' . $language->id, 'method' => 'DELETE']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <?php echo $languages->links(); ?>
    </div>

    {{ HTML::link('/admin', 'Back to Admin Home', array('class' => 'btn btn-primary')) }}
    {{ HTML::link('/admin/language/create', 'Create Language', array('class' => 'btn btn-success pull-right')) }}

</div>

@stop