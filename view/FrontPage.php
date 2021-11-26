<!DOCTYPE html>
<html lang="en">

<head>
    <!-- @{ViewData["Title"] = "Home Page";} -->
    <!-- link and script -->
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="../inc/js/script.js" async></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <title>Front page of the internet</title>
</head>

<body>

    <!-- Black banner with title -->
    <div class="container-fluid">
        <div class="row text-center border border-dark" style="background-color:#000000;">
            <div class="col">
                <h1 class="text-white mt-2">Front page of the internet</h1>
            </div>
        </div>
    </div>

    <!-- Top navigation -->
    <div class="container p-0 pt-3">
        <div class="row align-items-center mt-4">
            <div class="col">
                <label for="topic">Topic: </label>
                <select class="topic" name="topic">
                    <option value="@r.TopicId"></option>
                </select>
            </div>
            <div class="col text-center">
                <button id="FilterTopic" class="btn btn-primary btn-dark btn-lg" style="width:150px;">Filter</button>
            </div>
            <div class="col d-flex justify-content-md-end">
                <button id="AjouterPost" class="btn btn-primary btn-dark btn-lg" style="width:150px;">Add Post</button>
            </div>
        </div>
    </div>

    <!-- Form to add post -->

    <div class="container p-0 pt-5" id="addingPost" style="display:none">
    <form action="addPost" method="post">
        <div class="container p-0 pt-5">
            <div class="row p-3 py-0 border border-3 border-dark rounded">
                <div class="row my-3">
                    <div class="col-2">
                        <label for="topic">Topic: </label>
                    </div>
                    <div class="col-9">
                        <select class="topic" name="topic">
                            <option value="@r.TopicId"></option>
                        </select>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-2">
                        <label for="title">Title: </label>
                    </div>
                    <div class="col-9">
                        <input id="titleInput" type="text" name="title" size="60" pattern="^.{1,100}$" title="Vous avez trop de caractères (Maximum 100)">
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-2">
                        <label for="text">Post:</label>
                    </div>
                    <div class="col-9">
                        <textarea id="postTextArea" name="text" rows="6" cols="120" pattern="^.{1,255}$" title="Vous avez trop de caractères (Maximum 255)"></textarea>
                    </div>
                </div>
            </div>
            <div class="d-grid mt-3 d-flex justify-content-md-end">
                <div class="mx-4">
                    <button class="btn btn-primary btn-danger btn-lg" style="width:150px;" type="button" id="AnnulerPost">Cancel post</button>
                </div>
                <button class="btn btn-primary btn-dark btn-lg" name="Button_Click" type="submit" style="width:150px;">Create post</button>
            </div>
        </div>
        </form>
    </div>
    <!-- Need to add list of all post -->
    <div class="container p-0 pt-5">
        <div class="container p-0 pt-5">
            <div class="row p-3 py-0 border border-3 border-dark rounded">
                <div class="row my-3">
                    <div class="col-6">
                        <h2></h2>
                    </div>
                    <div class="col-6">
                        <h4></h4>
                    </div>
                </div>
                <div class="row my-3">
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <!-- See Comment Section -->
    <div class="container p-0" id="" style="display:none">
        <div class="container p-0">
            <div class="row p-3 py-0 border border-3 border-dark rounded">
                <div class="col-3">
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <div class="d-grid mt-3 d-flex justify-content-md-end">
        <div class="mx-4">
            <button class="btn btn-primary btn-dark btn-lg" type="button" id="">See comments</button>
        </div>
        <button class="btn btn-primary btn-dark btn-lg" type="button" id="">Create comment</button>
    </div>

    <!-- Add Comment -->
    <div class="container p-2" style="display:none" id="">
        <form action="addComment" method="post">
            <div class="container p-0">
                <div class="row p-3 py-0 border border-3 border-dark rounded">
                    <div class="col-1 p-3">
                        <label for="text">Username:</label>
                    </div>
                    <div class="col-2 p-3">
                        <input id="Username" type="text" pattern="^.{1,100}$" title="Vous avez trop de caractères (Maximum 100)">
                    </div>
                    <div class="col-1 p-3">
                        <label for="text">Post:</label>
                    </div>
                    <div class="col-8 p-3">
                        <textarea id="postTextArea" name="text" rows="3" cols="80" pattern="^.{1,255}$" title="Vous avez trop de caractères (Maximum 255)"></textarea>
                    </div>
                </div>
                <div class="d-grid mt-3 d-flex justify-content-md-end">
                    <button class="btn btn-primary btn-dark btn-lg" type="submit">Create Comment</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>