@extends('example.layout')

@section('pageTitle', '示例页面')

@section('header')
    @parent
    <h4>子 - 追加到父头部内容</h4>
@endsection

@section('content')
    <h4>子 - 主体内容</h4>

    <example-component></example-component>

    <div class="list-group">
        @foreach ($users as $user)
            <button type="button" class="list-group-item list-group-item-action list-group-item-primary" @click="msg('{{ $user['name'] }}')">
                {{ $loop->index }}：{{ $user['name'] }}
            </button>
        @endforeach

        <button type="button" class="list-group-item list-group-item-action" v-for="(user, index) in users" @click="msg(user.name)">
            @{{index}}：@{{ user.name }}
        </button>

        <button type="button" class="list-group-item list-group-item-action list-group-item-danger" @click="load">
            加载更多 >>>
        </button>
    </div>

@endsection

@section('script')
    const app = new Vue({
        el: '#app',
        data: {
            name:'vue set name',
            users: [],
            json1: @json($users),
            json2: @json($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE)
        },
        methods:{
            load: function() {
                this.users = _.concat(this.users, this.json1)
                return ;
            },
            msg(msg) {
                console.log(msg);
            }
        }
    })
@endsection
