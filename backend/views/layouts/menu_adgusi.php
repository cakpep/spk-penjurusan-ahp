<?php
use yii\helpers\Html;
?>

 <?php
 $level = !empty(Yii::$app->user->identity->level) ? Yii::$app->user->identity->level : null;
      if($level=='admin'){
      ?>
         <ul class="list-group">
          <li class="list-group-item"><div class = 'text-center'><b>MENU ADMIN</b></div></li>
          <li class="list-group-item"><?= Html::a('HOME', ['/site'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
          <li class="list-group-item"><?= Html::a('ADMIN', ['/admin'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
          <li class="list-group-item"><?= Html::a('JURUSAN', ['/jurusan'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
          <li class="list-group-item"><?= Html::a('MATA PELAJARAN', ['/matapelajaran'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
          <li class="list-group-item"><?= Html::a('GURU', ['/guru'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
          <li class="list-group-item"><?= Html::a('PENGAMPU', ['/matapelajaran-guru'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
          <li class="list-group-item"><?= Html::a('SISWA', ['/siswa'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
          <li class="list-group-item"><?= Html::a('MINAT & PSIKOTES', ['/minat-psikotes'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
          <li class="list-group-item"><?= Html::a('KELAS', ['/kelas'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
          <li class="list-group-item"><?= Html::a('PENJURUSAN', ['/hasil-pembobotan'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
        </ul>
        <ul class="list-group">
          <li class="list-group-item"><div class = 'text-center'><b>MENU INFO</b></div></li>
          <li class="list-group-item"><?= Html::a('BERITA', ['/berita'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
          <li class="list-group-item"><?= Html::a('KRITERIA', ['/kriteria'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
        </ul>
  
      <?php }elseif($level=='guru'){ ?>

          <ul class="list-group">
          <li class="list-group-item"><div class = 'text-center'><b>MENU GURU</b></div></li>
          <li class="list-group-item"><?= Html::a('HOME', ['/site'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
          <li class="list-group-item"><?= Html::a('PENGAMPU', ['/matapelajaran-guru'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
          <li class="list-group-item"><?= Html::a('NILAI', ['/nilai'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
          <li class="list-group-item"><?= Html::a('BERITA', ['/berita'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
        </ul>

      <?php }elseif($level=='siswa'){ ?>

          <ul class="list-group">
          <li class="list-group-item"><div class = 'text-center'><b>MENU SISWA</b></div></li>
          <li class="list-group-item"><?= Html::a('HOME', ['/site'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
          <li class="list-group-item"><?= Html::a('NILAI', ['/nilai'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
        </ul>
      <?php  } ?>