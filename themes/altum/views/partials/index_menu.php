<?php defined('ALTUMCODE') || die() ?>

<nav id="navbar" class="navbar navbar-index navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="<?= url() ?>">
            <?php if(settings()->logo != ''): ?>
                <img src="<?= UPLOADS_FULL_URL . 'logo/' . settings()->logo ?>" class="img-fluid navbar-logo" alt="<?= language()->global->accessibility->logo_alt ?>" />
            <?php else: ?>
                <?= settings()->main->title ?>
            <?php endif ?>
        </a>

        <button class="btn navbar-custom-toggler text-dark border-dark d-lg-none" type="button" data-toggle="collapse" data-target="#main_navbar" aria-controls="main_navbar" aria-expanded="false" aria-label="<?= language()->global->accessibility->toggle_navigation ?>">
            <i class="fa fa-fw fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="main_navbar">
            <ul class="navbar-nav">

                <?php foreach($data->pages as $data): ?>
                <li class="nav-item"><a class="nav-link" href="<?= $data->url ?>" target="<?= $data->target ?>"><?= $data->title ?></a></li>
                <?php endforeach ?>

                <?php if(settings()->payment->is_enabled): ?>
                    <?php if(\Altum\Plugin::is_active('affiliate') && settings()->affiliate->is_enabled): ?>
                        <li class="nav-item"><a class="nav-link" href="<?= url('affiliate') ?>"> <?= language()->affiliate->menu ?></a></li>
                    <?php endif ?>
                <?php endif ?>

                <?php if(settings()->links->directory_is_enabled): ?>
                    <li class="nav-item"><a class="nav-link" href="<?= url('directory') ?>"><?= language()->directory->menu ?></a></li>
                <?php endif ?>

                <?php if(\Altum\Middlewares\Authentication::check()): ?>

                    <li class="nav-item"><a class="nav-link" href="<?= url('dashboard') ?>"> <?= language()->dashboard->menu ?></a></li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
                            <img src="<?= get_gravatar($this->user->email, 80, 'identicon') ?>" class="navbar-avatar mr-1" loading="lazy" />
                            <?= $this->user->name ?> <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <?php if(\Altum\Middlewares\Authentication::is_admin()): ?>
                                <a class="dropdown-item" href="<?= url('admin') ?>"><i class="fa fa-fw fa-sm fa-user-shield mr-1"></i> <?= language()->global->menu->admin ?></a>
                            <?php endif ?>

                            <a class="dropdown-item" href="<?= url('links') ?>"><i class="fa fa-fw fa-sm fa-link mr-1"></i> <?= language()->links->menu ?></a>

                            <?php if(settings()->links->domains_is_enabled): ?>
                                <a class="dropdown-item" href="<?= url('domains') ?>"><i class="fa fa-fw fa-sm fa-globe mr-1"></i> <?= language()->domains->menu ?></a>
                            <?php endif ?>

                            <a class="dropdown-item" href="<?= url('data') ?>"><i class="fa fa-fw fa-sm fa-database mr-1"></i> <?= language()->data->menu ?></a>

                            <a class="dropdown-item" href="<?= url('projects') ?>"><i class="fa fa-fw fa-sm fa-project-diagram mr-1"></i> <?= language()->projects->menu ?></a>

                            <a class="dropdown-item" href="<?= url('pixels') ?>"><i class="fa fa-fw fa-sm fa-adjust mr-1"></i> <?= language()->pixels->menu ?></a>

                            <a class="dropdown-item" href="<?= url('qr-codes') ?>"><i class="fa fa-fw fa-sm fa-qrcode mr-1"></i> <?= language()->qr_codes->menu ?></a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="<?= url('account') ?>"><i class="fa fa-fw fa-sm fa-wrench mr-1"></i> <?= language()->account->menu ?></a>

                            <a class="dropdown-item" href="<?= url('account-plan') ?>"><i class="fa fa-fw fa-sm fa-box-open mr-1"></i> <?= language()->account_plan->menu ?></a>

                            <?php if(settings()->payment->is_enabled): ?>
                            <a class="dropdown-item" href="<?= url('account-payments') ?>"><i class="fa fa-fw fa-sm fa-dollar-sign mr-1"></i> <?= language()->account_payments->menu ?></a>

                                <?php if(\Altum\Plugin::is_active('affiliate') && settings()->affiliate->is_enabled): ?>
                                    <a class="dropdown-item" href="<?= url('referrals') ?>"><i class="fa fa-fw fa-sm fa-wallet mr-1"></i> <?= language()->referrals->menu ?></a>
                                <?php endif ?>
                            <?php endif ?>

                            <a class="dropdown-item" href="<?= url('account-api') ?>"><i class="fa fa-fw fa-sm fa-code mr-1"></i> <?= language()->account_api->menu ?></a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= url('logout') ?>"><i class="fa fa-fw fa-sm fa-sign-out-alt mr-1"></i> <?= language()->global->menu->logout ?></a>
                        </div>
                    </li>

                <?php else: ?>

                    <li class="nav-item d-flex align-items-center">
                        <a class="btn btn-sm btn-light" href="<?= url('login') ?>"><i class="fa fa-fw fa-sm fa-sign-in-alt"></i> <?= language()->login->menu ?></a>
                    </li>

                    <?php if(settings()->users->register_is_enabled): ?>
                    <li class="nav-item d-flex align-items-center">
                        <a class="btn btn-sm btn-primary" href="<?= url('register') ?>"><i class="fa fa-fw fa-sm fa-plus"></i> <?= language()->register->menu ?></a>
                    </li>
                    <?php endif ?>

                <?php endif ?>

            </ul>
        </div>
    </div>
</nav>
