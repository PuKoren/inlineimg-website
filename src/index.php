<?php require_once 'vendor/autoload.php'; ?>
<html>
  <head>
    <title>Online Image Inliner - from URL or from your disk</title>
    <style>
      h1,h2 {
        text-align: center;
      }
      form {
        margin: auto;
        width: 500px;
      }
      form input {
        display: block;
        width: 500px;
      }
      img {
        max-height: 150px;
        display: block;
      }
    </style>
  </head>
  <body>
    <h1>Inline your images</h1>
    <h2>Inline SVG, PNG, JPEG, etc. online from an URL or from your disk</h2>
    <form method="POST" enctype="multipart/form-data">
      <label for="remotefile">Enter a remote image URL here</label><input id="remotefile" name="remotefile" type="text" value="" placeholder="Your online image URL" />
      <label for="userfile">Or use an image from your disk</label><input id="userfile" name="userfile" type="file" placeholder="" /></br>
      <input type="submit" value="Inline now"/>
    </form>
    <div class="converted">
      <?php
        try {
            $i = 'a';
            function print_tag($converter) {
                global $i;
                $converted = $converter->convert();
                echo '<input id="'.$i.'" type="text" value="'.$converted.'"/>';
                echo '<button class="btn" data-clipboard-target="#'.$i.'">Copy to clipboard</button>';
                echo '<img src="'.$converted.'"/>';
                $i++;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (!empty($_POST['remotefile'])) {
                    $converter = new InlineImages\Converter($_POST['remotefile']);
                    print_tag($converter);
                }

                if (!empty($_FILES["userfile"]["tmp_name"])) {
                    $converter = new InlineImages\Converter($_FILES["userfile"]["tmp_name"]);
                    print_tag($converter);
                }
                echo '<script src="https://cdn.rawgit.com/zenorocha/clipboard.js/v1.5.12/dist/clipboard.min.js"></script>';
                echo '<script type="text/javascript">new Clipboard(".btn");</script>';
            }
        } catch (Exception $e) {
            echo 'An error occured: '.$e->getMessage();
        }
      ?>
    </div>
    If you find a bug please file an issue <a href="https://github.com/PuKoren/inlineimg-website">the github repository.</a>
  </body>
</html>