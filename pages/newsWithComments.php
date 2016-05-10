<?php foreach($articlesArr as $article) { ?>

        <blockquote>
            <h2>
                <?= $article['title'] ?>
            </h2>

            <p><img src="<?= $article['image'] ?>" width="600" height="600"></p>
            <footer>
                <?= $article['text'] ?><cite title="Source Title">Source Title</cite>
            </footer>
            <p>
                <b>
                    Time of article creation <?= $article['createDate'] ?>
                </b>
            </p>
           <?php foreach($commentsArr as $comment){ ?>
           <div style="margin: 35px 0 0 0">
            <p>
                <?= $comment['text'] ?>
            </p>
            <p>
                <b>
                    Time of comment creation <?= $comment['DateTime'] ?>
                </b>
                <?php if($comment['idUser'] == $_COOKIE['key']){ ?>
               <p><a href="http://project/news/deleteComment?id=<?= $comment['id'] ?>" class="btn btn-danger" role="button">Delete</a></p>
                <?php } ?>
            </p>
           </div>
           <?php } ?>

            <form action="http://project/news/commentAction" method="post" style="width: 500px; margin: 100px 0 0 0">
                <div class="form-group">
                    <label for="title">Add Comment...</label>
                    <input type="hidden" name="article" value="<?= $article['id'] ?>">
                    <textarea name="text" type="text" class="form-control" id="title"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>

            </form>
        </blockquote>


<?php } ?>


