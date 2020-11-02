{{-- 指令 --}}
{{-- @section 指令定义了视图的一部分内容 --}}
{{-- @yield 指令是用来显示指定部分的内容 --}}

{{-- @@extends 指令指定子视图要「继承」的视图 --}}
@extends('example.layout')


@section('pageTitle', '示例页面')

@section('header')
    @parent

    <h4>子 - 追加到父头部内容</h4>
@endsection

@section('content')
    <h4>子 - 主体内容</h4>

    @component('example.alert')
        这是一个可复用的组件
    @endcomponent

    @component('example.alert')
        @slot('title')
            slot 命名
        @endslot

        命名插槽外的内容将全部传递给默认 solt
    @endcomponent

    @component('example.alert',['title' => '传参'])
        可以通过第二个参数传递额外的参数
    @endcomponent

    <p>Hello, @{{ name }}.</p>
    @verbatim
        <div>
            <p>Hello, {{ name }}.</p>
            <p>Hello, {{ name }}.</p>
        </div>
    @endverbatim

    @if (count($records) === 1)
        I have one record!
    @elseif (count($records) > 1)
        I have multiple records!
    @else
        I don't have any records!
    @endif

    @unless (isset($var))
        <p>不成立的时候成立</p>
    @endunless

    @isset($records)
        // $records is defined and is not null...
    @endisset

    @empty($records)
        // $records is "empty"...
    @endempty

    @hasSection('navigation')
        <div class="pull-right">
            @yield('navigation')
        </div>

        <div class="clearfix"></div>
    @endif

    @section('navigation')
        <p>This is navigation.</p>
    @endsection

    <example-component></example-component>
    <br>
    <br>

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
