<!-- resources/views/components/markdown.blade.php -->

@php
    $htmlContent = (new \League\CommonMark\CommonMarkConverter())->convertToHtml(trim($slot));
@endphp

<div class="markdown-content">
    {!! $htmlContent !!}
</div>
