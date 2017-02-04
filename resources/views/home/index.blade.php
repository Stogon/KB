@extends('layout')

@section('content')
<h1>Welcome!</h1>
<section class="categories-container">
    <div class="row center-xs">
        @foreach($categories as $category)
            <a href="{{ route('category.show', $category->slug) }}" class="category col-xs-6 col-sm-4 col-md-3">
                <article>
                    @if($category->icon !== null)
                        <h1 class="icon"><i class="fa fa-4x {{ $category->icon }}"></i></h1>
                    @endif
                    <h2 class="name">{{ $category->name }}</h2>
                    <p class="description">{{ $category->description }}</p>
                    <aside>Plus</aside>
                </article>
            </a>
        @endforeach
    </div>
</section>
@endsection
