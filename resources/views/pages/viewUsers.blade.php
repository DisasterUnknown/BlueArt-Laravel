@extends('layouts.app')

@section('title', 'View Users')

@section('scriptIndex')
{{ asset('JavaScript/index.js') }}
@endsection

@section('scriptPage')
{{ asset('JavaScript/viewUsers.js') }}
@endsection

@section('content')
<div class="space-y-4 min-h-[calc(100vh-92px)]" id="viewUsersPage">
    <p class="text-2xl font-bold text-center mt-8 mb-10">View Users</p>
    <div id="userSections" class="flex flex-row flex-wrap justify-center items-center mt-8 gap-4">
        <!-- Page Data -->
    </div>
</div>

<!-- Backend replay section -->
<div class="hidden" id="compleateResponce">null1</div>
<div class="hidden" id="responce">null</div>
@endsection