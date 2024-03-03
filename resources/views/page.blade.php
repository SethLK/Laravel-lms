@include("layouts.head")

@include("layouts.navbar")

<div class="page-container m-4">
    <h1>{{ $page->title }}</h1>
    <div>{!! $page->content !!}</div>
</div>

@include("layouts.foot")
