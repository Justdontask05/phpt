<?php defined('ALTUMCODE') || die() ?>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="custom-breadcrumbs small">
            <li><a href="<?= url() ?>"><?= language()->index->breadcrumb ?></a> <i class="fa fa-fw fa-angle-right"></i></li>
            <li><a href="<?= url('api-documentation') ?>"><?= language()->api_documentation->breadcrumb ?></a> <i class="fa fa-fw fa-angle-right"></i></li>
            <li class="active" aria-current="page"><?= language()->api_documentation->domains->breadcrumb ?></li>
        </ol>
    </nav>

    <h1 class="h4"><?= language()->api_documentation->domains->header ?></h1>

    <div class="accordion">
        <div class="card">
            <div class="card-header bg-gray-50 p-3 position-relative">
                <h3 class="h6 m-0">
                    <a href="#" class="stretched-link" data-toggle="collapse" data-target="#domains_read_all" aria-expanded="true" aria-controls="domains_read_all">
                        <?= language()->api_documentation->domains->read_all_header ?>
                    </a>
                </h3>
            </div>

            <div id="domains_read_all" class="collapse">
                <div class="card-body">

                    <div class="form-group mb-4">
                        <label><?= language()->api_documentation->endpoint ?></label>
                        <div class="card bg-gray-100 border-0">
                            <div class="card-body">
                                <span class="badge badge-success mr-3">GET</span> <span class="text-muted"><?= SITE_URL ?>api/domains/</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label><?= language()->api_documentation->example ?></label>
                        <div class="card bg-gray-100 border-0">
                            <div class="card-body">
                                curl --request GET \<br />
                                --url '<?= SITE_URL ?>api/domains/' \<br />
                                --header 'Authorization: Bearer <span class="text-primary">{api_key}</span>' \
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-custom-container mb-4">
                        <table class="table table-custom">
                            <thead>
                            <tr>
                                <th><?= language()->api_documentation->parameters ?></th>
                                <th><?= language()->api_documentation->details ?></th>
                                <th><?= language()->api_documentation->description ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>page</td>
                                <td>
                                    <span class="badge badge-info"><?= language()->api_documentation->optional ?></span>
                                    <span class="badge badge-secondary"><?= language()->api_documentation->int ?></span>
                                </td>
                                <td><?= language()->api_documentation->filters->page ?></td>
                            </tr>
                            <tr>
                                <td>results_per_page</td>
                                <td>
                                    <span class="badge badge-info"><?= language()->api_documentation->optional ?></span>
                                    <span class="badge badge-secondary"><?= language()->api_documentation->int ?></span>
                                </td>
                                <td><?= sprintf(language()->api_documentation->filters->results_per_page, '<code>' . implode('</code> , <code>', [10, 25, 50, 100, 250, 500]) . '</code>', 25) ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <label><?= language()->api_documentation->response ?></label>
                        <div class="card bg-gray-100 border-0">
                                        <pre class="card-body">
{
    "data": [
        {
            "id": 1,
            "scheme": "https://",
            "host": "example.com",
            "custom_index_url": "",
            "is_enabled": true,
            "last_datetime": null,
            "datetime": "2021-02-04 23:29:18"
        },
    ],
    "meta": {
        "page": 1,
        "results_per_page": 25,
        "total": 1,
        "total_pages": 1
    },
    "links": {
        "first": "<?= SITE_URL ?>api/domains?&page=1",
        "last": "<?= SITE_URL ?>api/domains?&page=1",
        "next": null,
        "prev": null,
        "self": "<?= SITE_URL ?>api/domains?&page=1"
    }
}</pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-gray-50 p-3 position-relative">
                <h3 class="h6 m-0">
                    <a href="#" class="stretched-link" data-toggle="collapse" data-target="#domains_read" aria-expanded="true" aria-controls="domains_read">
                        <?= language()->api_documentation->domains->read_header ?>
                    </a>
                </h3>
            </div>

            <div id="domains_read" class="collapse">
                <div class="card-body">

                    <div class="form-group mb-4">
                        <label><?= language()->api_documentation->endpoint ?></label>
                        <div class="card bg-gray-100 border-0">
                            <div class="card-body">
                                <span class="badge badge-success mr-3">GET</span> <span class="text-muted"><?= SITE_URL ?>api/domains/</span><span class="text-primary">{domain_id}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label><?= language()->api_documentation->example ?></label>
                        <div class="card bg-gray-100 border-0">
                            <div class="card-body">
                                curl --request GET \<br />
                                --url '<?= SITE_URL ?>api/domains/<span class="text-primary">{domain_id}</span>' \<br />
                                --header 'Authorization: Bearer <span class="text-primary">{api_key}</span>' \
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><?= language()->api_documentation->response ?></label>
                        <div class="card bg-gray-100 border-0">
                                        <pre class="card-body">
{
    "data": {
        "id": 1,
        "scheme": "https://",
        "host": "example.com",
        "custom_index_url": "",
        "is_enabled": true,
        "last_datetime": null,
        "datetime": "2021-02-04 23:29:18"
    }
}</pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-gray-50 p-3 position-relative">
                <h3 class="h6 m-0">
                    <a href="#" class="stretched-link" data-toggle="collapse" data-target="#domains_create" aria-expanded="true" aria-controls="domains_create">
                        <?= language()->api_documentation->domains->create_header ?>
                    </a>
                </h3>
            </div>

            <div id="domains_create" class="collapse">
                <div class="card-body">

                    <div class="form-group mb-4">
                        <label><?= language()->api_documentation->endpoint ?></label>
                        <div class="card bg-gray-100 border-0">
                            <div class="card-body">
                                <span class="badge badge-info mr-3">POST</span> <span class="text-muted"><?= SITE_URL ?>api/domains</span>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-custom-container mb-4">
                        <table class="table table-custom">
                            <thead>
                            <tr>
                                <th><?= language()->api_documentation->parameters ?></th>
                                <th><?= language()->api_documentation->details ?></th>
                                <th><?= language()->api_documentation->description ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>host</td>
                                <td>
                                    <span class="badge badge-danger"><?= language()->api_documentation->required ?></span>
                                    <span class="badge badge-secondary"><?= language()->api_documentation->string ?></span>
                                </td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>custom_index_url</td>
                                <td>
                                    <span class="badge badge-info"><?= language()->api_documentation->optional ?></span>
                                    <span class="badge badge-secondary"><?= language()->api_documentation->string ?></span>
                                </td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>custom_not_found_url</td>
                                <td>
                                    <span class="badge badge-info"><?= language()->api_documentation->optional ?></span>
                                    <span class="badge badge-secondary"><?= language()->api_documentation->string ?></span>
                                </td>
                                <td>-</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group mb-4">
                        <label><?= language()->api_documentation->example ?></label>
                        <div class="card bg-gray-100 border-0">
                            <div class="card-body">
                                curl --request POST \<br />
                                --url '<?= SITE_URL ?>api/domains' \<br />
                                --header 'Authorization: Bearer <span class="text-primary">{api_key}</span>' \<br />
                                --header 'Content-Type: multipart/form-data' \<br />
                                --form 'host=<span class="text-primary">domain.com</span>' \<br />
                                --form 'custom_index_url=<span class="text-primary">https://mywebsite.com/</span>' \<br />
                                --form 'custom_not_found_url=<span class="text-primary">https://mywebsite.com/404-page</span>'
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><?= language()->api_documentation->response ?></label>
                        <div class="card bg-gray-100 border-0">
                                        <pre class="card-body">
{
    "data": {
        "id": 1
    }
}</pre>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-gray-50 p-3 position-relative">
                <h3 class="h6 m-0">
                    <a href="#" class="stretched-link" data-toggle="collapse" data-target="#domains_update" aria-expanded="true" aria-controls="domains_update">
                        <?= language()->api_documentation->domains->update_header ?>
                    </a>
                </h3>
            </div>

            <div id="domains_update" class="collapse">
                <div class="card-body">

                    <div class="form-group mb-4">
                        <label><?= language()->api_documentation->endpoint ?></label>
                        <div class="card bg-gray-100 border-0">
                            <div class="card-body">
                                <span class="badge badge-info mr-3">POST</span> <span class="text-muted"><?= SITE_URL ?>api/domains/</span><span class="text-primary">{domain_id}</span>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-custom-container mb-4">
                        <table class="table table-custom">
                            <thead>
                            <tr>
                                <th><?= language()->api_documentation->parameters ?></th>
                                <th><?= language()->api_documentation->details ?></th>
                                <th><?= language()->api_documentation->description ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>host</td>
                                <td>
                                    <span class="badge badge-info"><?= language()->api_documentation->optional ?></span>
                                    <span class="badge badge-secondary"><?= language()->api_documentation->string ?></span>
                                </td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>custom_index_url</td>
                                <td>
                                    <span class="badge badge-info"><?= language()->api_documentation->optional ?></span>
                                    <span class="badge badge-secondary"><?= language()->api_documentation->string ?></span>
                                </td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>custom_not_found_url</td>
                                <td>
                                    <span class="badge badge-info"><?= language()->api_documentation->optional ?></span>
                                    <span class="badge badge-secondary"><?= language()->api_documentation->string ?></span>
                                </td>
                                <td>-</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group mb-4">
                        <label><?= language()->api_documentation->example ?></label>
                        <div class="card bg-gray-100 border-0">
                            <div class="card-body">
                                curl --request POST \<br />
                                --url '<?= SITE_URL ?>api/domains/<span class="text-primary">{domain_id}</span>' \<br />
                                --header 'Authorization: Bearer <span class="text-primary">{api_key}</span>' \<br />
                                --header 'Content-Type: multipart/form-data' \<br />
                                --form 'host=<span class="text-primary">domain.com</span>' \<br />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><?= language()->api_documentation->response ?></label>
                        <div class="card bg-gray-100 border-0">
                                        <pre class="card-body">
{
  "data": {
    "id": 1
  }
}</pre>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-gray-50 p-3 position-relative">
                <h3 class="h6 m-0">
                    <a href="#" class="stretched-link" data-toggle="collapse" data-target="#domains_delete" aria-expanded="true" aria-controls="domains_delete">
                        <?= language()->api_documentation->domains->delete_header ?>
                    </a>
                </h3>
            </div>

            <div id="domains_delete" class="collapse">
                <div class="card-body">

                    <div class="form-group mb-4">
                        <label><?= language()->api_documentation->endpoint ?></label>
                        <div class="card bg-gray-100 border-0">
                            <div class="card-body">
                                <span class="badge badge-danger mr-3">DELETE</span> <span class="text-muted"><?= SITE_URL ?>api/domains/</span><span class="text-primary">{domain_id}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><?= language()->api_documentation->example ?></label>
                        <div class="card bg-gray-100 border-0">
                            <div class="card-body">
                                curl --request DELETE \<br />
                                --url '<?= SITE_URL ?>api/domains/<span class="text-primary">{domain_id}</span>' \<br />
                                --header 'Authorization: Bearer <span class="text-primary">{api_key}</span>' \<br />
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
