<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo e(Helper::Email_Subject(4)); ?></title>
</head>
<body class="preload dashboard-upload">
<?php echo html_entity_decode(Helper::Email_Content(4,["{{name}}","{{user_token}}","{{forgot_url}}"],["$name","$user_token","$forgot_url"])) ?>
</body>
</html><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/forgot_mail.blade.php ENDPATH**/ ?>