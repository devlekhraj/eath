@extends('website.layout.master')
@section('content')

<div class="container py-5 vuetify-pro-tiptap-editor__content view markdown-theme-default">
   <div>
    {!! $page->content !!}
   </div>
  
</div>

@endsection
