@extends('layouts.app')

@section('title', 'View Kick Users')

@section('scriptIndex')
{{ asset('JavaScript/index.js') }}
@endsection

@section('scriptPage')
{{ asset('JavaScript/viewKickUsers.js') }}
@endsection

@section('content')
<div class="space-y-4 min-h-[calc(100vh-92px)]" id="viewKickUsersPage">
    <p class="text-2xl font-bold text-center mt-8 mb-10">View Kicked Users</p>
    <div id="userSections" class="flex flex-row flex-wrap justify-evenly mt-8">
        <!-- Page Data -->
    </div>
</div>

<!-- Backend replay section -->
<div class="hidden" id="compleateResponce">null1</div>
<div class="hidden" id="responce">null</div>
@endsection