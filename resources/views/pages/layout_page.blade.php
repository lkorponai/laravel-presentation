@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>

    @forelse ($users as $user)
        @include('partials.user.list_item', ['user' => $user])
    @empty
        <p>No users</p>
    @endforelse

@endsection
