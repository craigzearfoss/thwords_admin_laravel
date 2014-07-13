@extends('layouts.admin')

@section('title') Show Thword @stop

@section('content')

<div class='col-lg-8 col-lg-offset-2'>

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

    <h1>
        <i class="fa fa-thword"></i> Show Thword
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h1>

    {{ Breadcrumbs::render() }}

    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td>Topic</td>
                    <td>{{ $thwArray['thword']['topic'] }}</td>
                </tr>
                <tr style="display: none;">
                    <td>Category</td>
                    <td>{{ $thwArray['category']['name'] }}</td>
                </tr>
                <tr style="display: none;">
                    <td>Subject</td>
                    <td>{{ $thwArray['subject']['name'] }}</td>
                </tr>
                <tr>
                    <td>Language</td>
                    <td>{{ $thwArray['thword']['lang'] }}</td>
                </tr>
                <tr style="display: none;">
                    <td>Expert</td>
                    <td>{{ $thwArray['thword']['expert'] }}</td>
                </tr>
                <tr style="display: none;">
                    <td>Description</td>
                    <td>{{ $thwArray['thword']['description'] }}</td>
                </tr>
                <tr>
                    <td>Answers</td>
                    <td>
                        <?php $answers = explode('|', $thwArray['thword']['answers']); ?>
                        @foreach ($answers as $answer)
                            <li>
                            @if (strpos($answer, '^') !== false)
                                {{ str_replace('^', ' (', $answer) }})
                            @else
                                {{ $answer }}
                            @endif
                            </li>
                        @endforeach

                    </td>
                </tr>
                <tr style="display: none;">
                    <td>Bonus</td>
                    <td>
                        @if ($thwArray['thword']['bonus'])
                            YES
                        @else
                            NO
                        @endif
                    </td>
                </tr>
                <tr style="display: none;">
                    <td>Bonus Question</td>
                    <td>{{ $thwArray['thword']['bonus_question'] }}</td>
                </tr>
                <tr>
                    <td>Source</td>
                    <td>
                        {{ HTML::link($thwArray['thword']['source'], $thwArray['thword']['source'], ['target' => '_blank']) }}
                    </td>
                </tr>
                <tr style="display: none;">
                    <td>Notes</td>
                    <td>{{ $thwArray['thword']['notes'] }}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $thwArray['thword']['created_at'] }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $thwArray['thword']['updated_at'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        {{ HTML::link('/admin/thword', 'Back', ['class' => 'btn btn-primary']) }}
        {{ HTML::link('/admin/thword/'.$thwArray['thword']['id'].'/edit', 'Edit', ['class' => 'btn btn-primary']) }}    </div>

    {{ Form::close() }}

</div>

@stop