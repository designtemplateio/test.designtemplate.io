<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ Helper::Email_Subject(5) }}</title>
</head>
<body class="preload dashboard-upload">
@php echo html_entity_decode(Helper::Email_Content(5,["{{item_url}}"],["$item_url"])) @endphp
</body>
</html>