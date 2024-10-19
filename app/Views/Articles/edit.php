<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Edit Article<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>Edit Article</h1>

<?= form_open("articles/update/{$article->id}") ?>

<label for="title">Title:</label>
<input type="text" name="title" value="<?= esc($article->title) ?>" />

<label for="content">Content:</label>
<textarea name="content"><?= esc($article->content) ?></textarea>

<button>Save</button>
<?= form_close() ?>

<?= $this->endSection() ?>
