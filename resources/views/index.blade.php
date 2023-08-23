<x-app-layout>
    <main class="container">
        <div class="Welcome__header container">
            <p class="Welcome__header__title">
                Welcome to Oyekanmi's blog
            </p>
            <p class="Welcome__header__text">
                If u love to read, then you are at the right place.
            </p>
        </div>
        <div>
            @if (Count($posts) > 0)
                <p class="Welcome__stories--title">Latest Stories</p>
                <div class="Post__grid">
                    @foreach ($posts as $post)
                    <x-postview :post="$post"/>
                    @endforeach
                </div>
            @endif
        </div>
    </main>
</x-app-layout>