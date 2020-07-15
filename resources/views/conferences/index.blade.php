@extends('layouts.index', ['title' => 'Conferences'])

@php
    $linkRouteKeysWithDefaults = ['filter' => 'future', 'sort' => 'closing_next'];
    $inactiveLinkClasses = 'filter-link py-1 px-5 hover:bg-indigo-100';
@endphp

@section('sidebar')
    <div class="flex md:flex-col">
        <x-panel size="sm" class="w-1/2 md:w-full font-sans">
            <div class="bg-indigo-150 p-4">Filter</div>
            <div class="flex flex-col py-4">
                {!! HTML::activeLinkRoute($linkRouteKeysWithDefaults, 'conferences.index', 'Future', ['filter' => 'future'], ['class' => $inactiveLinkClasses]) !!}
                {!! HTML::activeLinkRoute($linkRouteKeysWithDefaults, 'conferences.index', 'CFP is Open', ['filter' => 'open_cfp'], ['class' => $inactiveLinkClasses]) !!}
                {!! HTML::activeLinkRoute($linkRouteKeysWithDefaults, 'conferences.index', 'Unclosed CFP', ['filter' => 'unclosed_cfp'], ['class' => $inactiveLinkClasses]) !!}
                @if (Auth::check())
                    {!! HTML::activeLinkRoute($linkRouteKeysWithDefaults, 'conferences.index', 'Favorites', ['filter' => 'favorites'], ['class' => $inactiveLinkClasses]) !!}
                    {!! HTML::activeLinkRoute($linkRouteKeysWithDefaults, 'conferences.index', 'Dismissed', ['filter' => 'dismissed'], ['class' => $inactiveLinkClasses]) !!}
                @endif
                {!! HTML::activeLinkRoute($linkRouteKeysWithDefaults, 'conferences.index', 'All time', ['filter' => 'all'], ['class' => $inactiveLinkClasses]) !!}
            </div>
        </x-panel>

        <x-panel size="sm" class="w-1/2 md:w-full ml-4 md:ml-0 mt-4">
            <div class="bg-indigo-150 p-4">Sort</div>
            <div class="flex flex-col py-4">
                {!! HTML::activeLinkRoute($linkRouteKeysWithDefaults, 'conferences.index', 'CFP Closing Next', ['sort' => 'closing_next'], ['class' => $inactiveLinkClasses]) !!}
                {!! HTML::activeLinkRoute($linkRouteKeysWithDefaults, 'conferences.index', 'CFP Opening Next', ['sort' => 'opening_next'], ['class' => $inactiveLinkClasses]) !!}
                {!! HTML::activeLinkRoute($linkRouteKeysWithDefaults, 'conferences.index', 'Title', ['sort' => 'alpha'], ['class' => $inactiveLinkClasses]) !!}
                {!! HTML::activeLinkRoute($linkRouteKeysWithDefaults, 'conferences.index', 'Date', ['sort' => 'date'], ['class' => $inactiveLinkClasses]) !!}
            </div>
        </x-panel>
    </div>
    <x-button.primary
        :href="route('conferences.create')"
        icon="plus"
        class="block mt-4 w-full"
    >
        Add Conference
    </x-button.primary>
@endsection


@section('list')
    @each('conferences.listing', $conferences, 'conference', 'conferences.listing-empty')
@endsection
