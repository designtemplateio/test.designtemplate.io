<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ Helper::Email_Subject(23) }}</title>
</head>
<body class="preload dashboard-upload">
@php echo html_entity_decode(Helper::Email_Content(23,["{{name}}","{{from_email}}"],["$name","$from_email"])) @endphp
</body>
</html>