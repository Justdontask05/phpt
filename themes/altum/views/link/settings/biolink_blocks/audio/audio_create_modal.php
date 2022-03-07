<?php defined('ALTUMCODE') || die() ?>

<div class="modal fade" id="create_biolink_audio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" data-toggle="modal" data-target="#biolink_link_create_modal" data-dismiss="modal" class="btn btn-sm btn-link"><i class="fa fa-fw fa-chevron-circle-left text-muted"></i></button>
                <h5 class="modal-title"><?= language()->create_biolink_audio_modal->header ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="<?= language()->global->close ?>">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form name="create_biolink_audio" method="post" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="token" value="<?= \Altum\Middlewares\Csrf::get() ?>" required="required" />
                    <input type="hidden" name="request_type" value="create" />
                    <input type="hidden" name="link_id" value="<?= $data->link->link_id ?>" />
                    <input type="hidden" name="block_type" value="audio" />

                    <div class="notification-container"></div>

                    <div class="form-group">
                        <label for="audio_file"><i class="fa fa-fw fa-volume-up fa-sm text-muted mr-1"></i> <?= language()->create_biolink_audio_modal->file ?></label>
                        <input id="audio_file" type="file" name="file" accept="<?= implode(', ', array_map(function($value) { return '.' . $value; }, $data->biolink_blocks['audio']['whitelisted_file_extensions'])) ?>" class="form-control-file" required="required" />
                        <small class="form-text text-muted"><?= language()->create_biolink_audio_modal->file_help ?></small>
                    </div>

                    <div class="form-group">
                        <label for="audio_name"><i class="fa fa-fw fa-paragraph fa-sm text-muted mr-1"></i> <?= language()->create_biolink_link_modal->input->name ?></label>
                        <input id="audio_name" type="text" name="name" maxlength="128" class="form-control" required="required" />
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" name="submit" class="btn btn-block btn-primary"><?= language()->global->submit ?></button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
