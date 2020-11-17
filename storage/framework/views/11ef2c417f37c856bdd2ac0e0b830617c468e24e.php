<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Application d'information avec laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            body {
                font-family: 'Roboto';
            }
        </style>
    </head>
    <body>
        <div id="appendDivNews">
            <nav class="navbar fixed-top navbar-light bg-faded" style="background: #e3f2fd">
                <a class="navbar-brand" href="#"> Les nouvelles dans le monde</a>
            </nav>

            <?php echo e(csrf_field()); ?>


            <section id="content" class="section-dropdown">
                <p class="select-header"> Selection de source: </p>
                <label clas="select">
                    <select name="news_sources" id="news_sources">
                    <option value="<?php echo e(@$source_id); ?> : <?php echo e(@$source_name); ?>"><?php echo e($source_name); ?></option>
                    <?php $__currentLoopData = $news_sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news_source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($news_source['id']); ?> : <?php echo e($news_source['name']); ?>"><?php echo e($news_source['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </label>
            </section>
        <p>les nouvelles sources : <?php echo e($source_name); ?></p>
            <section class="news">
                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selected_news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article>
                <img src="<?php echo e($selected_news['urlToImage']); ?>" alt="">
                <div class="text">
                <h1><?php echo e($selected_news['title']); ?></h1>
                <p style="font-size: 14px"> <?php echo e($selected_news['description']); ?> <a href="<?php echo e($selected_news['url']); ?>" target="_blank"><small>lire plus...</small></a> </p>
                <div style="padding-top: 5px; font-size: 12px">Auteur: <?php echo e($selected_news['author'] or "Unknown"); ?></div>
                <?php if($selected_news['publishedAt'] != null): ?>
                <div style="padding-top: 5px">Date de publication: <?php echo e(Carbon\Carbon::parse($selected_news['publishedAt'])->format('l jS \\of F Y')); ?></div>
                <?php else: ?>
                <div style="padding-top: 5px">Date de publication: Unknown</div>
                <?php endif; ?>
                </div>
                </article>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </section>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</html>
<?php /**PATH /home/programmer/newsapp/resources/views/welcome.blade.php ENDPATH**/ ?>