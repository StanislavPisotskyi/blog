<?php foreach($articlesArr as $article){ ?>

    <blockquote>
        <h2>
            <?=$article['title']?>
        </h2>

        <?php foreach($authorArr as $author){
            if($author['id'] == $article['idUser']){ ?>
                <p>
                    Author:
                    <img src="<?= $author['avatar'] ?>" width="50" height="50">
                    <b><?= $author['name']." ".$author['lastName'] ?></b>
                </p>
            <?php	}
        } ?>

        <p><img src="<?=$article['image']?>" width="600" height="600"></p>
        <p>
            <b>
                Time of creation <?=$article['createDate']?>
            </b>
            <?php if($article['idUser'] == $_COOKIE['key']){ ?>
                <p><a href="http://project/news/deleteArticle?id=<?= $article['id'] ?>" class="btn btn-danger" role="button">Delete</a></p>
            <?php } ?>
        </p>
        <p><a href="http://project/news/readNews?article=<?= $article['id'] ?>" class="btn btn-success" role="button">Read More...</a></p>
    </blockquote>

<?php } ?>


