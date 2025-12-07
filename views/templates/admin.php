<?php 
    /** 
     * Affichage de la partie admin : liste des articles avec un bouton "modifier" pour chacun. 
     * Et un formulaire pour ajouter un article. 
     */
?>

<h2>Edition des articles</h2>

<div class="adminArticle">
    <form method="get" action="index.php">
        <input type="hidden" name="action" value="admin">
        <label for="sortSelect">Trier par :</label >
        <select class="submit" id="sortSelect" name="sort" onchange="this.form.submit()">
            <option value=""></option>
            <option value="views" <?= $sortType === 'views' ? 'selected' : '' ?>>Nombre de vues (croissant)</option>
            <option value="commentsViews" <?= $sortType === 'commentsViews' ? 'selected' : '' ?>>Nombre de commentaires (croissant)</option>
            <option value="dateCreation" <?= $sortType === 'dateCreation' ? 'selected' : '' ?>>Date de publication (croissant)</option>
            <option value="viewsDe" <?= $sortType === 'viewsDe' ? 'selected' : '' ?>>Nombre de vues (décroissant)</option>
            <option value="commentsViewsDe" <?= $sortType === 'commentsViewsDe' ? 'selected' : '' ?>>Nombre de commentaires (décroissant)</option>
            <option value="dateCreationDe" <?= $sortType === 'dateCreationDe' ? 'selected' : '' ?>>Date de publication (décroissant)</option>
        </select>
    </form>
    <?php foreach ($articles as $index => $article) { ?>
        <div class="articleLine <?= $index % 2 !== 0 ? 'secondBackgroundColor' : '' ?>">
            <div class="title"><?= $article->getTitle() ?></div>
            <div class="content"><?= $article->getContent(200) ?></div>
            <div class="views"><?= $article->getViews() ?></div>
            <div class="commentsViews"><?= $article->countComments() ?></div>
            <div class="dateCreation"><?= $article->getDateCreation()?->format('d/m/Y H:i') ?? '' ?></div>
            <div><a class="submit" href="index.php?action=showUpdateArticleForm&id=<?= $article->getId() ?>">Modifier</a></div>
            <div><a class="submit" href="index.php?action=deleteArticle&id=<?= $article->getId() ?>" <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer cet article ?") ?> >Supprimer</a></div>
        </div>
    <?php } ?>
</div>

<a class="submit" href="index.php?action=showUpdateArticleForm">Ajouter un article</a>