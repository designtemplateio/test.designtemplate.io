<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo e(Helper::Email_Subject(9)); ?></title>
</head>
<body class="preload dashboard-upload">
<?php echo html_entity_decode(Helper::Email_Content(9,["{{name}}","{{email}}","{{register_url}}"],["$name","$email","$register_url"])) ?>
</body>
</html><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/register_mail.blade.php ENDPATH**/ ?>