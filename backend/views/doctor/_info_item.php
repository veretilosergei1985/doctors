<div class="img-thumbnail img-rounded text-center">
    <img style="padding:2px;width:100%" src="<?php echo Yii::$app->params['frontendBaseUrl'] ?>/uploads/doctors/<?php echo $doctor->primaryKey . '/' . $doctor->image; ?>">
    <div class="small text-muted">Published: </div>
</div>

<div class="doctor-grid-item-main-info">
    <p class="doctor-title">
    <strong>Описание</strong>
    </p>
    <p>
       <?php echo $doctor->description; ?></br>
    </p>

    <hr class="dotted">

    <?php if(isset($doctor->education->description)) { ?>
        <p class="doctor-title">
            <strong>Образование</strong>
        </p>
        <p>
        <?php echo $doctor->education->description; ?></br>
        </p>
        <hr class="dotted">
    <?php } ?>

    <?php if(isset($doctor->course->description)) { ?>
        <p class="doctor-title">
            <strong>Курсы</strong>
        </p>
        <p>
            <?php echo $doctor->course->description; ?></br>
        </p>
        <hr class="dotted">
    <?php } ?>

    <!--
    <table class="table table-bordered table-condensed table-hover small kv-table">
        <tbody>
        <tr class="success">
            <th class="text-center text-success" colspan="3">Main info</th>
        </tr>
        <tr class="active">
            <th class="text-center">Details:</th>
            <th><?php echo $doctor->details; ?></th>
        </tr>
        <tr>
        <tr class="warning">
            <th>#</th>
            <th>#</th>
        </tr>
        </tbody>
    </table>
    -->
</div>
