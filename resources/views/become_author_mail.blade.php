<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ Helper::Email_Subject(22) }}</title>
</head>
<body class="preload dashboard-upload">
@php echo html_entity_decode(Helper::Email_Content(22,["{{name}}","{{from_email}}"],["$name","$from_email"])) @endphp
</body>
</html>