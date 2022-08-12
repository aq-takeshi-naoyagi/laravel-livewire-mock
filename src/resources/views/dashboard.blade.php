<x-app-layout xmlns:livewire="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
{{--                <livewire:autocomplete />--}}
                <h1 class="custom"><b>プロジェクト登録</b></h1>
                {{ Form::open(['route' => 'create']) }}
                <div class="form-group">
                    {{ Form::label('task', '案件名：') }}
                    {{ Form::text('task', null, ['class' => 'form-control']) }}<br>
                    <livewire:counter />
                    {{ Form::label('client', '顧客名：') }}
                    {{ Form::label('client', $bbb, ['class' => 'form-control']) }}<br>
                    {{ Form::label('name', '担当者：') }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}<br>
                    {{ Form::button('登録', ['type' => 'submit', 'onfocus' => 'this.blur();']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

{{--        タスク名と期限の入力フォーム--}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
{{--                <x-jet-welcome />--}}
                <h1><b>入力フォーム</b></h1>
                {{ Form::open(['route' => 'create']) }}
                <div class="form-group">
                    {{ Form::label('task', 'タスク：') }}
                    {{ Form::text('task', null, ['class' => 'form-control']) }}<br>
                    @php
                        $deadline = [
                            '1'      => '1週間',
                            '2' => '2週間' ,
                            '3'   => '3週間'
                        ];
                    @endphp
                    {{ Form::label('deadline', '期限：') }}
                    {{ Form::select('deadline', $deadline, '1', ['class' => 'my_class']) }}<br>
                    {{ Form::button('登録', ['type' => 'submit', 'onfocus' => 'this.blur();']) }}
                </div>
                {{ Form::close() }}

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div><br>

{{--            一覧表示(リマインド)--}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1><b>リマインド(期限まで一週間を切ったタスク)</b></h1>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>タスク</th>
                        <th>期限</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sortDates as $sortDate)
                        <tr>

                            <td>{{$sortDate->task}}</td>
                            <td>{{$sortDate->deadline}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><br>


{{--        検索--}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1><b>検索</b></h1>
                {{ Form::open(['route' => 'dashboard']) }}
                <div class="form-group">
                    {{ Form::text('keyWord', null, ['class' => 'form-control']) }}
                    {{ Form::button('検索', ['type' => 'submit', 'onfocus' => 'this.blur();']) }}
                </div>
                {{ Form::close() }}


            </div><br>


{{--            一覧表示(全部)--}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <h1><b>一覧表示</b></h1>
                <table class="table table-striped ">
                    <thead>
                    <tr>
                        <th>タスク</th>
                        <th>期限</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dates as $date)
                    <tr>
                        <td>{{$date->task}}</td>
                        <td>{{$date->deadline}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
