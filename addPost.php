<!DOCTYPE html>
<html lang="en">
    <html>
        <p>votre post a été envoyer</p>
        <button class="btn btn-primary btn-dark btn-lg" type="button"onClick="document.location.href='52.60.127.121'" >Front Page of the internet</button>
        <?php
        require 'controller/HomeController.php';
        $title = $_POST["title"];
        $topic = $_POST["topic"];
        $postTextArea = $_POST["postTextArea"];
        $post = new showFrontpage(); 
        $post->addPost();?>
    </html>