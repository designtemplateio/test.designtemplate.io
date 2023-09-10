<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ Helper::Email_Subject(4) }}</title>
</head>
<body class="preload dashboard-upload">
@php echo html_entity_decode(Helper::Email_Content(4,["{{name}}","{{user_token}}","{{forgot_url}}"],["$name","$user_token","$forgot_url"])) @endphp
</body>
</html>