<?php require_once 'vendor/autoload.php'; ?>
<html>
  <head>
  </head>
  <body>
    <h1>Inline your images</h1>
    An online image inliner
    <h2>Inline SVG, PNG, JPEG, etc. online from an URL or from your disk:</h2>
    <form method="POST">
      <input name="fileUrl" type="text" value="" placeholder="Enter an image URL here" />
      <input type="submit" value="Inline it!"/>
    </form>
    <div class="converted">
    <?php
      try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $converter = new InlineImages\Converter($_POST['fileUrl']);
          $tag = '<img src="'.$converter->convert().'"/>';
          echo htmlspecialchars($tag);
          echo $tag;
        }
      } catch (Exception $e){
        echo 'An error occured: '.$e->getMessage();
      }
    ?>
    </div>
    If you find a bug please file an issue <a href="https://github.com/PuKoren/inlineimg-website">the github repository.</a>
  </body>
</html>