<?php defined('ALTUMCODE') || die() ?>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="custom-breadcrumbs small">
            <li><a href="<?= url() ?>"><?= language()->index->breadcrumb ?></a> <i class="fa fa-fw fa-angle-right"></i></li>
            <li class="active" aria-current="page"><?= language()->directory->breadcrumb ?></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12 col-xl mb-3 mb-xl-0">
            <h2 class="h4"><?= language()->directory->header ?></h2>
            <p class="text-muted"><?= language()->directory->subheader ?></p>
        </div>

        <div class="col-12 col-xl-auto d-flex">
            <div class="ml-3">
                <div class="dropdown">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle-simple" data-toggle="dropdown" data-boundary="viewport" title="<?= language()->global->export ?>">
                        <i class="fa fa-fw fa-sm fa-download"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-right d-print-none">
                        <a href="<?= url('directory?' . $data->filters->get_get() . '&export=csv')  ?>" target="_blank" class="dropdown-item">
                            <i class="fa fa-fw fa-sm fa-file-csv mr-1"></i> <?= language()->global->export_csv ?>
                        </a>
                        <a href="<?= url('directory?' . $data->filters->get_get() . '&export=json') ?>" target="_blank" class="dropdown-item">
                            <i class="fa fa-fw fa-sm fa-file-code mr-1"></i> <?= language()->global->export_json ?>
                        </a>
                    </div>
                </div>
            </div>

            <div class="ml-3">
                <div class="dropdown">
                    <button type="button" class="btn <?= count($data->filters->get) ? 'btn-outline-primary' : 'btn-outline-secondary' ?> filters-button dropdown-toggle-simple" data-toggle="dropdown" data-boundary="viewport" title="<?= language()->global->filters->header ?>">
                        <i class="fa fa-fw fa-sm fa-filter"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-right filters-dropdown">
                        <div class="dropdown-header d-flex justify-content-between">
                            <span class="h6 m-0"><?= language()->global->filters->header ?></span>

                            <?php if(count($data->filters->get)): ?>
                                <a href="<?= url('directory') ?>" class="text-muted"><?= language()->global->filters->reset ?></a>
                            <?php endif ?>
                        </div>

                        <div class="dropdown-divider"></div>

                        <form action="" method="get" role="form">
                            <div class="form-group px-4">
                                <label for="filters_search" class="small"><?= language()->global->filters->search ?></label>
                                <input type="search" name="search" id="filters_search" class="form-control form-control-sm" value="<?= $data->filters->search ?>" />
                            </div>

                            <div class="form-group px-4">
                                <label for="filters_search_by" class="small"><?= language()->global->filters->search_by ?></label>
                                <select name="search_by" id="filters_search_by" class="form-control form-control-sm">
                                    <option value="url" <?= $data->filters->order_by == 'url' ? 'selected="selected"' : null ?>><?= language()->links->filters->search_by_url ?></option>
                                </select>
                            </div>

                            <div class="form-group px-4">
                                <label for="filters_order_by" class="small"><?= language()->global->filters->order_by ?></label>
                                <select name="order_by" id="filters_order_by" class="form-control form-control-sm">
                                    <option value="clicks" <?= $data->filters->order_by == 'clicks' ? 'selected="selected"' : null ?>><?= language()->links->filters->order_by_clicks ?></option>
                                    <option value="url" <?= $data->filters->order_by == 'url' ? 'selected="selected"' : null ?>><?= language()->links->filters->order_by_url ?></option>
                                </select>
                            </div>

                            <div class="form-group px-4">
                                <label for="filters_order_type" class="small"><?= language()->global->filters->order_type ?></label>
                                <select name="order_type" id="filters_order_type" class="form-control form-control-sm">
                                    <option value="ASC" <?= $data->filters->order_type == 'ASC' ? 'selected="selected"' : null ?>><?= language()->global->filters->order_type_asc ?></option>
                                    <option value="DESC" <?= $data->filters->order_type == 'DESC' ? 'selected="selected"' : null ?>><?= language()->global->filters->order_type_desc ?></option>
                                </select>
                            </div>

                            <div class="form-group px-4">
                                <label for="filters_results_per_page" class="small"><?= language()->global->filters->results_per_page ?></label>
                                <select name="results_per_page" id="filters_results_per_page" class="form-control form-control-sm">
                                    <?php foreach($data->filters->allowed_results_per_page as $key): ?>
                                        <option value="<?= $key ?>" <?= $data->filters->results_per_page == $key ? 'selected="selected"' : null ?>><?= $key ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group px-4 mt-4">
                                <button type="submit" name="submit" class="btn btn-sm btn-primary btn-block"><?= language()->global->submit ?></button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="row">
            <?php foreach($data->links as $row): ?>
                <div class="col-lg-6">
                    <div class="custom-row my-4">
                        <div class="row">
                            <div class="col-8">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column min-width-0">
                                        <div class="d-inline-block text-truncate">
                                            <span class="font-weight-bold"><?= $row->url ?></span>
                                            <?php if($row->is_verified): ?>
                                                <span data-toggle="tooltip" title="<?= language()->link->biolink->verified ?>"><i class="fa fa-fw fa-xs fa-check-circle" style="color: #3897F0"></i></span>
                                            <?php endif ?>
                                        </div>
                                        <div class="d-flex align-items-center">
                                    <span class="d-inline-block text-truncate">
                                        <img src="https://external-content.duckduckgo.com/ip3/<?= parse_url($row->full_url)['host'] ?>.ico" class="img-fluid icon-favicon mr-1" />
                                        <a href="<?= $row->full_url ?>" class="text-muted align-middle" target="_blank" rel="noreferrer"><?= $row->full_url ?></a>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-2 d-flex align-items-center">
                                <div>
                                    <span data-toggle="tooltip" title="<?= language()->links->clicks ?>"><span class="badge badge-light"><i class="fa fa-fw fa-sm fa-chart-bar mr-1"></i> <?= nr($row->clicks) ?></span></span>
                                </div>
                            </div>

                            <div class="col-2 d-flex justify-content-end align-items-center">
                                <button
                                        id="url_copy"
                                        type="button"
                                        class="btn btn-link text-muted"
                                        data-toggle="tooltip"
                                        title="<?= language()->global->clipboard_copy ?>"
                                        aria-label="<?= language()->global->clipboard_copy ?>"
                                        data-copy="<?= language()->global->clipboard_copy ?>"
                                        data-copied="<?= language()->global->clipboard_copied ?>"
                                        data-clipboard-text="<?= $row->full_url ?>"
                                >
                                    <i class="fa fa-fw fa-sm fa-copy"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

        <div class="mt-3"><?= $data->pagination ?></div>
    </div>
</div>

<?php include_view(THEME_PATH . 'views/partials/clipboard_js.php') ?>
