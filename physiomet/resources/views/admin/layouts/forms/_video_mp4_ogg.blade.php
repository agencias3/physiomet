<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Vídeo MP4</label>
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input">
                        <i class="fa fa-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-default btn-file">
                        <span class="fileupload-exists">Trocar</span>
                        <span class="fileupload-new">Selecionar</span>
                        <input type="file" name="video_mp4" />
                    </span>
                    <a href="#" class="btn btn-default   fileupload-exists" data-dismiss="fileupload">Remover</a>
                    <?php if(isset($dados->video_mp4) && $dados->video_mp4 != ''){ ?>
                    <a href="{{ asset('uploads/'.$path.'/'.$dados->video_mp4) }}" target="_blank" class="btn btn-default active">Visualizar</a>
                    <a href="{{ $route_destroy_1 }}" class="btn btn-default">Deletar</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Vídeo OGG</label>
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input">
                        <i class="fa fa-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-default btn-file">
                        <span class="fileupload-exists">Trocar</span>
                        <span class="fileupload-new">Selecionar</span>
                        <input type="file" name="video_ogg" />
                    </span>
                    <a href="#" class="btn btn-default   fileupload-exists" data-dismiss="fileupload">Remover</a>
                    <?php if(isset($dados->video_ogg) && $dados->video_ogg != ''){ ?>
                    <a href="{{ asset('uploads/'.$path.'/'.$dados->video_ogg) }}" target="_blank" class="btn btn-default active">Visualizar</a>
                    <a href="{{ $route_destroy_2 }}" class="btn btn-default">Deletar</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>