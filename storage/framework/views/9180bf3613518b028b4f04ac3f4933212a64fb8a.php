<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo e(Helper::Email_Subject(23)); ?></title>
</head>
<body class="preload dashboard-upload">
<?php echo html_entity_decode(Helper::Email_Content(23,["{{name}}","{{from_email}}"],["$name","$from_email"])) ?>
</body>
</html><?php /**PATH /home/u728587553/domains/designtemplate.io/public_html/resources/views/approve_author_mail.blade.php ENDPATH**/ ?>