<!DOCTYPE html>
<html>
<head>
    <title><?= $this->fetch('title') ?></title>
</head>
<body>
    <!-- inline styles: https://css-tricks.com/using-css-in-html-emails-the-real-story/ -->
    <div style="
        background: #6db3f2;
        color: white;
        padding: 20px;
         "><img src="cid:logo-id" alt="Tienda Online"/></div>
    <div style="
        padding: 10px;
        min-height: 200px;
        margin-bottom: 40px;
         "><?= $this->fetch('content') ?></div>
    <div style="
        width: 100%;
        background: #3b3f41;
        color: white;
        line-height: 40px;
        text-align: center;
        font-weight: bold;
        font-size: 13px;
         ">Todos los Derechos Reservados <?=$this->Time->format(time(), 'Y')?></div>
</body>
</html>
