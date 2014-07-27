@extends('layouts.admin')

@section('title') Show {{ $thwordData['name'] }} @stop

@section('content')

<div class='col-lg-8 col-lg-offset-2'>

    @if (!empty($successMsg))
        <div class='bg-success alert'>{{ $successMsg }}</div>
    @endif

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

    <h2>
        <i class="fa fa-{{ $thwordData['url'] }}"></i> Show {{ $thwordData['name'] }}
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h2>

    {{ Breadcrumbs::render() }}

    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td colspan="100%">
                        <div class="nav-btn-container" class="pull-left" style="width: auto;">
                            {{ HTML::link('/admin/'.$thwordData['url'].'/first', '|<', ['class' => 'btn btn-primary pull-left', 'title' => 'go to first']) }}
                            {{ HTML::link('/admin/'.$thwordData['url'].'/'.$thwordData['data']['thword']['id'].'/previous', '<', ['class' => 'btn btn-primary pull-left', 'title' => 'go to previous']) }}
                            {{ HTML::link('/admin/'.$thwordData['url'].'/'.$thwordData['data']['thword']['id'].'/next', '>', ['class' => 'btn btn-primary pull-left', 'title' => 'go to next']) }}
                            {{ HTML::link('/admin/'.$thwordData['url'].'/last', '>|', ['class' => 'btn btn-primary pull-left', 'title' => 'go to last']) }}
                        </div>
                        <div class="pull-right" style="width: auto;">
                            {{ HTML::link('/admin/'.$thwordData['url'].'/create', 'Create a '.$thwordData['name'], array('class' => 'btn btn-primary')) }}
                            {{ HTML::link('/admin/'.$thwordData['url'].'/'.$thwordData['data']['thword']['id'].'/edit', 'Edit This '.$thwordData['name'], ['class' => 'btn btn-primary']) }}
                            {{ HTML::link('/admin/'.$thwordData['url'].'', $thwordData['name'].' Listing', ['class' => 'btn btn-primary']) }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>{{ $thwordData['data']['thword']['id'] }}</td>
                </tr>

                @if ($thwordData['field']['parent_id']['display'])
                    <tr>
                        <td>{{ $thwordData['field']['parent_id']['label'] }}</td>
                        <td>{{ $thwordData['data']['thword']['parent_id'] }}</td>
                    </tr>
                @endif

                @if ($thwordData['field']['category_id']['display'])
                    <tr>
                        <td>{{ $thwordData['field']['category_id']['label'] }}</td>
                        <td>{{ $thwordData['data']['category']['name'] }}</td>
                    </tr>
                @endif

                @if ($thwordData['field']['subject_id']['display'])
                    <tr>
                        <td>{{ $thwordData['field']['subject_id']['label'] }}</td>
                        <td>{{ $thwordData['data']['subject']['name'] }}</td>
                    </tr>
                @endif

                @if ($thwordData['field']['lang']['display'])
                    <tr>
                        <td>{{ $thwordData['field']['lang']['label'] }}</td>
                        <td>{{ $thwordData['data']['thword']['lang'] }}</td>
                    </tr>
                @endif

                @if ($thwordData['field']['level']['display'])
                    <tr>
                        <td>{{ $thwordData['field']['level']['label'] }}</td>
                        <td>{{ $thwordData['data']['thword']['level'] }}</td>
                    </tr>
                @endif

                @if ($thwordData['field']['topic']['display'])
                    <tr>
                        <td>{{ $thwordData['field']['topic']['label'] }}</td>
                        <td>{{ $thwordData['data']['thword']['topic'] }}</td>
                    </tr>
                @endif

                @if ($thwordData['field']['description']['display'])
                    <tr>
                        <td>{{ $thwordData['field']['description']['label'] }}</td>
                        <td>{{ $thwordData['data']['thword']['description'] }}</td>
                    </tr>
                @endif

                @if ($thwordData['field']['answers']['display'])
                    <tr>
                        <td>{{ $thwordData['field']['answers']['label'] }}</td>
                        <td>
                            <?php $answers = explode('|', $thwordData['data']['thword']['answers']); ?>
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
                @endif

                @if ($thwordData['field']['correct_answer']['display'])
                    <tr>
                        <td>{{ $thwordData['field']['correct_answer']['label'] }}</td>
                        <td>
                            @foreach ($thwordData['data']['thword']['correct_answer'] as $correctAnswer)
                                @if ($correctAnswer == -3)
                                    <li>Scramble</li>
                                @elseif ($correctAnswer == -2)
                                    <li>Sort</li>
                                @elseif ($correctAnswer == -1)
                                    <li>Type-in</li>
                                @elseif ($correctAnswer == 0)
                                    <li>All are correct</li>
                                @else
                                    <li>{{ $correctAnswer }}</li>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @endif

                @if ($thwordData['field']['max_choices']['display'])
                    <tr>
                        <td>{{ $thwordData['field']['max_choices']['label'] }}</td>
                        <td>{{ $thwordData['data']['thword']['max_choices'] }}</td>
                    </tr>
                @endif

                @if ($thwordData['field']['points']['display'])
                    <tr>
                        <td>{{ $thwordData['field']['points']['label'] }}</td>
                        <td>{{ $thwordData['data']['thword']['points'] }}</td>
                    </tr>
                @endif

                @if ($thwordData['field']['bonus']['display'])
                    <tr>
                        <td>{{ $thwordData['field']['bonus']['label'] }}</td>
                        <td>
                            @if ($thwordData['data']['thword']['bonus'])
                            YES
                            @else
                            NO
                            @endif
                        </td>
                    </tr>
                @endif

                @if ($thwordData['field']['bonus_question']['display'])
                    <tr>
                        <td>{{ $thwordData['field']['bonus_question']['label'] }}</td>
                        <td>{{ $thwordData['data']['thword']['bonus_question'] }}</td>
                    </tr>
                @endif

                @if ($thwordData['field']['details']['display'])
                    <tr>
                        <td>{{ $thwordData['field']['details']['label'] }}</td>
                        <td>{{ $thwordData['data']['thword']['details'] }}</td>
                    </tr>
                @endif

                @if ($thwordData['field']['source']['display'])
                    <tr>
                        <td>{{ $thwordData['field']['source']['label'] }}</td>
                        <td>
                            {{ HTML::link($thwordData['data']['thword']['source'], $thwordData['data']['thword']['source'], ['target' => '_blank']) }}
                        </td>
                    </tr>
                @endif

                @if ($thwordData['field']['notes']['display'])
                    <tr>
                        <td>{{ $thwordData['field']['notes']['label'] }}</td>
                        <td>{{ $thwordData['data']['thword']['notes'] }}</td>
                    </tr>
                @endif

                <tr>
                    <td>Created At</td>
                    <td>{{ $thwordData['data']['thword']['created_at'] }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $thwordData['data']['thword']['updated_at'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{ Form::close() }}

</div>

@stop