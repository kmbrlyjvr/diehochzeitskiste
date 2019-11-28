@extends('layouts.master') @section('container')
<main>
    <section class="main-head">
        <div class="main">
            <div>
                <h1 class="subheader">Checkliste</h1>
                
            </div>
        </div>
    </section>
    <section class="main-checklist">
        <ul class="checklist">
            @foreach($checklists as $checklist)
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <path
                        d="M26 0C11.664 0 0 11.663 0 26s11.664 26 26 26 26-11.663 26-26S40.336 0 26 0zm0 50C12.767 50 2 39.233 2 26S12.767 2 26 2s24 10.767 24 24-10.767 24-24 24z"
                    />
                    <path
                        d="M38.252 15.336l-15.369 17.29-9.259-7.407a1 1 0 00-1.249 1.562l10 8a.999.999 0 001.373-.117l16-18a1 1 0 10-1.496-1.328z"
                    />
                </svg>
                <a href="{{ route('checklist.show', $checklist->id) }}">{{ $checklist->title }} </a>
                <span>
                    <a href="{{ route('checklist.show', $checklist->id) }}"></a>
                </span>
            </li>
            @endforeach
            <a href="{{ route('checklist.create') }}">Checkliste hinzufügen</a>
        </ul>
    </section>
</main>
@endsection
