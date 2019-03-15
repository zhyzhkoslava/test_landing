<div style="margin: 0px 50px 0px 50px;">

    @if(isset($portfolios))

        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>№ п/п</th>
                    <th>Имя</th>
                    <th>Фильтер</th>
                    <th>Удалить</th>
                </tr>
            </thead>

            <tbody>

            @foreach($portfolios as $k => $portfolio)

                <tr>

                    <td>{{  $portfolio->id }}</td>
                    <td>{!! Html::link(route('portfoliosEdit', ['portfolio' => $portfolio->id]), $portfolio->name, ['alt' => $portfolio->name]) !!}</td>
                    <td>{{  $portfolio->filter }}</td>
                    <td>
                        {!! Form::open(['url' => route('portfoliosEdit', ['portfolio' => $portfolio->id]), 'class' => 'form-horizontal', 'method' => "POST" ]) !!}

                        {{ method_field('DELETE') }}
                        {!! Form::button('Удалить', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>

    @endif

    {!! Html::link(route('portfoliosAdd'), 'Новая страница') !!}

</div>
