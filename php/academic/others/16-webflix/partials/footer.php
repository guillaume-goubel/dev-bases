        <div class="container">
            <footer class="pt-4 my-md-5 pt-md-5 border-top">
                <div class="row">
                    <div class="col-12 col-md">
                        <h5 class="mb-2">Webflix</h5>
                        <small class="d-block mb-3 text-muted">&copy; <?= date('Y'); ?></small>
                    </div>
                    <?php foreach (getRandomCategories() as $category) { ?>
                        <div class="col-6 col-md">
                            <h5><?= $category['name']; ?></h5>
                            <ul class="list-unstyled text-small">
                                <?php foreach (getMovies($category['id'], 4) as $movie) { ?>
                                <li><a class="text-muted" href="movie_single.php?id=<?= $movie['id']; ?>"><?= $movie['title']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </footer>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>
