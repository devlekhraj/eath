<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" /> --}}

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    {{-- @vite(['resources/admin/main.js', 'resources/admin/admin.scss']) --}}
    @vite(['resources/website/js/website.js', 'resources/website/scss/website.scss'])
    <style>
        *,
        html,
        body {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
</head>

<body>
    <div class="vuetify-pro-tiptap-editor__content view markdown-theme-default">
        <div>
            {!! $package->description !!}
        </div>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos, similique.</p>
    </div>
</body>

</html>
