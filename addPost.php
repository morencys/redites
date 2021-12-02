<!DOCTYPE html>
<html lang="en">
    <html>
        <p>votre post a été envoyer</p>
        <?php
        require 'controller/HomeController.php';
        $title = $_POST["title"];
        $topic = $_POST["topic"];
        $postTextArea = $_POST["postTextArea"];
        $post = new showFrontpage(); 
        $post->addPost();?>
        <button class="btn btn-primary btn-dark btn-lg" type="button"onClick="document.location.href='/'" >Front Page of the internet</button>
    </html>