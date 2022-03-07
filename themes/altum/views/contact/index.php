<?php defined('ALTUMCODE') || die() ?>

<div class="container">
    <?= \Altum\Alerts::output_alerts() ?>

    <nav aria-label="breadcrumb">
        <ol class="custom-breadcrumbs small">
            <li><a href="<?= url() ?>"><?= language()->index->breadcrumb ?></a> <i class="fa fa-fw fa-angle-right"></i></li>
            <li class="active" aria-current="page"><?= language()->contact->breadcrumb ?></li>
        </ol>
    </nav>

    <div>
        <h1 class="h4"><?= language()->contact->header ?></h1>
        <p class="text-muted"><?= language()->contact->subheader ?></p>

        <form action="" method="post" role="form">
            <input type="hidden" name="token" value="<?= \Altum\Middlewares\Csrf::get() ?>" />

            <div class="form-group">
                <label for="email"><?= language()->contact->input->email ?></label>
                <input id="email" type="email" name="email" class="form-control <?= \Altum\Alerts::has_field_errors('email') ? 'is-invalid' : null ?>" value="<?= $data->values['email'] ?>" maxlength="64" required="required" />
                <?= \Altum\Alerts::output_field_error('email') ?>
            </div>

            <div class="form-group">
                <label for="name"><?= language()->contact->input->name ?></label>
                <input id="name" type="text" name="name" class="form-control <?= \Altum\Alerts::has_field_errors('name') ? 'is-invalid' : null ?>" value="<?= $data->values['name'] ?>" maxlength="320" required="required" />
                <?= \Altum\Alerts::output_field_error('name') ?>
            </div>

            <div class="form-group">
                <label for="subject"><?= language()->contact->input->subject ?></label>
                <input id="subject" type="text" name="subject" class="form-control <?= \Altum\Alerts::has_field_errors('subject') ? 'is-invalid' : null ?>" value="<?= $data->values['subject'] ?>" maxlength="128" required="required" />
                <?= \Altum\Alerts::output_field_error('subject') ?>
            </div>

            <div class="form-group">
                <label for="message"><?= language()->contact->input->message ?></label>
                <textarea id="message" name="message" class="form-control <?= \Altum\Alerts::has_field_errors('message') ? 'is-invalid' : null ?>" maxlength="2048" required="required"><?= $data->values['message'] ?></textarea>
                <?= \Altum\Alerts::output_field_error('message') ?>
            </div>

            <?php if(settings()->captcha->contact_is_enabled): ?>
                <div class="form-group">
                    <?php $data->captcha->display() ?>
                </div>
            <?php endif ?>

            <button type="submit" name="submit" class="btn btn-primary btn-block"><?= language()->global->submit ?></button>
        </form>
    </div>
</div>
