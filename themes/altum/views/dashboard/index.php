<?php defined('ALTUMCODE') || die() ?>

<header class="mb-6">
    <div class="container">
        <?= \Altum\Alerts::output_alerts() ?>

        <div class="row justify-content-between">
            <div class="col-12 col-lg-4 mb-3">
                <div class="card h-100 position-relative">
                    <div class="card-body d-flex">
                        <div>
                            <div class="card border-0 bg-primary-100 mr-3 position-static">
                                <div class="p-3 d-flex align-items-center justify-content-between">
                                    <a href="<?= url('links?type=link') ?>" class="stretched-link text-primary-600">
                                        <i class="fa fa-fw fa-link fa-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="card-title h4 m-0"><?= nr($data->links_total) ?></div>
                            <span class="text-muted"><?= language()->dashboard->links ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-3">
                <div class="card h-100 position-relative">
                    <div class="card-body d-flex">
                        <div>
                            <div class="card border-0 bg-primary-100 mr-3 position-static">
                                <div class="p-3 d-flex align-items-center justify-content-between">
                                    <i class="fa fa-fw fa-chart-bar fa-lg text-primary-600"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="card-title h4 m-0"><?= nr($data->links_clicks_total) ?></div>
                            <span class="text-muted"><?= language()->dashboard->links_clicks ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-3">
                <div class="card h-100 position-relative">
                    <div class="card-body d-flex">
                        <div>
                            <div class="card border-0 bg-primary-100 mr-3 position-static">
                                <div class="p-3 d-flex align-items-center justify-content-between">
                                    <a href="<?= url('links?type=biolink') ?>" class="stretched-link text-primary-600">
                                        <i class="fa fa-fw fa-hashtag fa-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="card-title h4 m-0"><?= nr($data->biolinks_total) ?></div>
                            <span class="text-muted"><?= language()->dashboard->biolinks ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 mb-3">
                <div class="card h-100 position-relative">
                    <div class="card-body d-flex">
                        <div>
                            <div class="card border-0 bg-primary-100 mr-3 position-static">
                                <div class="p-3 d-flex align-items-center justify-content-between">
                                    <i class="fa fa-fw fa-chart-bar fa-lg text-primary-600"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="card-title h4 m-0"><?= nr($data->links_clicks_total) ?></div>
                            <span class="text-muted"><?= language()->dashboard->biolinks_clicks ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <?php if(settings()->links->domains_is_enabled): ?>
            <div class="col-12 col-lg-4 mb-3">
                <div class="card h-100 position-relative">
                    <div class="card-body d-flex">
                        <div>
                            <div class="card border-0 bg-primary-100 mr-3 position-static">
                                <div class="p-3 d-flex align-items-center justify-content-between">
                                    <a href="<?= url('domains') ?>" class="stretched-link text-primary-600">
                                        <i class="fa fa-fw fa-globe fa-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="card-title h4 m-0"><?= nr($data->domains_total) ?></div>
                            <span class="text-muted"><?= language()->dashboard->domains ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>

            <div class="col-12 col-lg-4 mb-3">
                <div class="card h-100 position-relative">
                    <div class="card-body d-flex">
                        <div>
                            <div class="card border-0 bg-primary-100 mr-3 position-static">
                                <div class="p-3 d-flex align-items-center justify-content-between">
                                    <a href="<?= url('projects') ?>" class="stretched-link text-primary-600">
                                        <i class="fa fa-fw fa-project-diagram fa-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="card-title h4 m-0"><?= nr($data->projects_total) ?></div>
                            <span class="text-muted"><?= language()->dashboard->projects ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if($data->links_chart): ?>
            <div class="card mt-4">
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="clicks_chart"></canvas>
                    </div>
                </div>
            </div>
        <?php endif ?>

    </div>
</header>

<?php require THEME_PATH . 'views/partials/ads_header.php' ?>

<section class="container">

    <?= \Altum\Alerts::output_alerts() ?>

    <?= $this->views['links_content'] ?>

</section>

<?php ob_start() ?>
<script src="<?= ASSETS_FULL_URL . 'js/libraries/Chart.bundle.min.js' ?>"></script>
<script src="<?= ASSETS_FULL_URL . 'js/chartjs_defaults.js' ?>"></script>

<script>
    if(document.getElementById('clicks_chart')) {
        let clicks_chart = document.getElementById('clicks_chart').getContext('2d');

        let gradient = clicks_chart.createLinearGradient(0, 0, 0, 250);
        gradient.addColorStop(0, 'rgba(56, 178, 172, 0.6)');
        gradient.addColorStop(1, 'rgba(56, 178, 172, 0.05)');

        let gradient_white = clicks_chart.createLinearGradient(0, 0, 0, 250);
        gradient_white.addColorStop(0, 'rgba(56,62,178,0.6)');
        gradient_white.addColorStop(1, 'rgba(56, 62, 178, 0.05)');

        new Chart(clicks_chart, {
            type: 'line',
            data: {
                labels: <?= $data->links_chart['labels'] ?? '[]' ?>,
                datasets: [
                    {
                        label: <?= json_encode(language()->link->statistics->pageviews) ?>,
                        data: <?= $data->links_chart['pageviews'] ?? '[]' ?>,
                        backgroundColor: gradient,
                        borderColor: '#38B2AC',
                        fill: true
                    },
                    {
                        label: <?= json_encode(language()->link->statistics->visitors) ?>,
                        data: <?= $data->links_chart['visitors'] ?? '[]' ?>,
                        backgroundColor: gradient_white,
                        borderColor: '#383eb2',
                        fill: true
                    }
                ]
            },
            options: chart_options
        });
    }
</script>
<?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>

