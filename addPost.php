<!DOCTYPE html>
<html lang="en">
    <html>
        <p>votre post a été envoyer</p>
        <button class="btn btn-primary btn-dark btn-lg" type="button"onClick="document.location.href='/'" >Front Page of the internet</button>
        <?php
        require "controller/HomeController.php";
        echo $title = $_POST["title"];
        echo $postTextArea = $_POST["postTextArea"];
        $post = new showFrontpage(); 
        $post->addPost($title, $postTextArea);?>
    </html>