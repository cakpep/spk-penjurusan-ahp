<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kriteria */

$this->title = 'Metode';
$this->params['breadcrumbs'][] = ['label' => 'PSIKOTES', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
    <div class="col-md-3">
        <?= Html::a('Kriteria Prioritas', ['/kriteria/metode'], ['class' => 'btn btn-block btn-primary']) ?>
    </div>
    <div class="col-md-3">
        <?= Html::a('Sub Kriteria Nilai', ['/kriteria/metode','ktg'=>'nilai'], ['class' => 'btn btn-block btn-primary']) ?>
    </div>
    <div class="col-md-3">
        <?= Html::a('Sub Kriteria Minat', ['/kriteria/metode','ktg'=>'minat'], ['class' => 'btn btn-block btn-primary']) ?>
    </div>
    <div class="col-md-3">
        <?= Html::a('Sub Kriteria Psikotes', ['/kriteria/metode','ktg'=>'psikotes'], ['class' => 'btn btn-block btn-primary']) ?>
    </div>
</p>
<div class="kriteria-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>Matriks Perbandingan Psikotes</h3>
    <?php $form = ActiveForm::begin(['action'=>['kriteria/metode-simpan','methode' => 'psikotes']]); ?>
    
        
    <table class="table table-bordered">
        <tr>
            <td>&nbsp;</td>
            <td><b>IPA</b></td>
            <td><b>IPS</b></td>
            <td><b>BAHASA</b></td>
        </tr>
        <tr>
            <td><b>IPA</b></td>
            <td><input type="text" disabled="true" id="nilai-nilai" value="<?php echo $data['nilai']['nilai']; ?>"></td>
            <td>
                <?php
                    $kriteriaModel->nilaiMinat = $data['nilai']['minat'];
                ?>
                <?= $form->field($kriteriaModel, 'nilaiMinat')->textInput(['maxlength' => true])->label(false) ?>
            <td>
                <?php
                    $kriteriaModel->nilaiPsikotes = $data['nilai']['psikotes'];
                ?>
                <?= $form->field($kriteriaModel, 'nilaiPsikotes')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td><b>IPS</b></td>
            <td><input type="text" disabled="true" id="minat-nilai"  value="<?php echo $data['minat']['nilai']; ?>"></td>
            <td><input type="text" disabled="true" id="minat-minat"  value="<?php echo $data['minat']['minat']; ?>"></td>
            <td>
                <?php
                    $kriteriaModel->minatPsikotes = $data['minat']['psikotes'];
                ?>
          
                <?= $form->field($kriteriaModel, 'minatPsikotes')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td><b>BAHASA</b></td>
            <td><input type="text" disabled="true" id="psikotets-nilai"  value="<?php echo $data['psikotes']['nilai']; ?>"></td>
            <td><input type="text" disabled="true" id="psikotets-minat"  value="<?php echo $data['psikotes']['minat']; ?>"></td>
            <td><input type="text" disabled="true" id="psikotets-psikotest"  value="<?php echo $data['psikotes']['psikotes']; ?>"></td>
        </tr>
        <tr>
            <td><b>Jumlah</b></td>
            <td><input type="text" disabled="true" id="jumlah-nilai"  value="<?php echo $data['jumlah']['nilai']; ?>"></td>
            <td><input type="text" disabled="true" id="jumlah-minat"  value="<?php echo $data['jumlah']['minat']; ?>"></td>
            <td><input type="text" disabled="true" id="jumlah-psikotest"  value="<?php echo $data['jumlah']['psikotes']; ?>"></td>
        </tr>
        
    </table>
        <div class="row">
            <div class="col-sm-6">
                <button value="prioritas" type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
    
    
    <h3>Matriks Nilai Kriteria</h3>
     <table class="table table-bordered">
        <tr>
            <td>&nbsp;</td>
            <td><b>IPA</b></td>
            <td><b>IPS</b></td>
            <td><b>BAHASA</b></td>
            <td><b>Jumlah</b></td>
            <td><b>Prioritas</b></td>
            <td><b>Prioritas Sub</b></td>
        </tr>
        <tr>
            <td><b>IPA</b></td>
            <td><input type="text" disabled="true" id="nilai-nilai" value="<?php echo $matriksNilaiKriteria['nilai']['nilai']; ?>"></td>
            <td><input type="text" disabled="true" id="nilai-minat" value="<?php echo $matriksNilaiKriteria['nilai']['minat']; ?>"></td>
            <td><input type="text" disabled="true" id="nilai-psikotest" value="<?php echo $matriksNilaiKriteria['nilai']['psikotes']; ?>"></td>
            <td><input type="text" disabled="true" id="nilai-jumlah" value="<?php echo $matriksNilaiKriteria['jumlah']['nilai']; ?>"></td>
            <td><input type="text" disabled="true" id="nilai-prioritas" value="<?php echo $matriksNilaiKriteria['prioritas']['nilai']; ?>"></td>
            <td><input type="text" disabled="true" id="nilai-prioritas" value="<?php echo number_format($matriksNilaiKriteria['prioritas']['nilai']/max($matriksNilaiKriteria['prioritas']),2); ?>"></td>
        </tr>
        <tr>
            <td><b>IPS</b></td>
            <td><input type="text" disabled="true" id="minat-nilai"  value="<?php echo $matriksNilaiKriteria['minat']['nilai']; ?>"></td>
            <td><input type="text" disabled="true" id="minat-minat"  value="<?php echo $matriksNilaiKriteria['minat']['minat']; ?>"></td>
            <td><input type="text" disabled="true" id="minat-psikotest"  value="<?php echo $matriksNilaiKriteria['minat']['psikotes']; ?>"></td>
            <td><input type="text" disabled="true" id="minat-jumlah" value="<?php echo $matriksNilaiKriteria['jumlah']['minat']; ?>"></td>
            <td><input type="text" disabled="true" id="minat-prioritas" value="<?php echo $matriksNilaiKriteria['prioritas']['minat']; ?>"></td>
            <td><input type="text" disabled="true" id="nilai-prioritas" value="<?php echo number_format($matriksNilaiKriteria['prioritas']['minat']/max($matriksNilaiKriteria['prioritas']),2); ?>"></td>
        </tr>
        <tr>
            <td><b>BAHASA</b></td>
            <td><input type="text" disabled="true" id="psikotets-nilai"  value="<?php echo $matriksNilaiKriteria['psikotes']['nilai']; ?>"></td>
            <td><input type="text" disabled="true" id="psikotets-minat"  value="<?php echo $matriksNilaiKriteria['psikotes']['minat']; ?>"></td>
            <td><input type="text" disabled="true" id="psikotets-psikotest"  value="<?php echo $matriksNilaiKriteria['psikotes']['psikotes']; ?>"></td>
            <td><input type="text" disabled="true" id="psikotets-jumlah" value="<?php echo $matriksNilaiKriteria['jumlah']['psikotes']; ?>"></td>
            <td><input type="text" disabled="true" id="psikotets-prioritas" value="<?php echo $matriksNilaiKriteria['prioritas']['psikotes']; ?>"></td>
            <td><input type="text" disabled="true" id="nilai-prioritas" value="<?php echo number_format($matriksNilaiKriteria['prioritas']['psikotes']/max($matriksNilaiKriteria['prioritas']),2); ?>"></td>
        </tr>        
        
    </table>
    
    <h3>Matriks Penjumlahan Setiap Baris</h3>
    <table class="table table-bordered">
        <tr>
            <td>&nbsp;</td>
            <td><b>IPA</b></td>
            <td><b>IPS</b></td>
            <td><b>BAHASA</b></td>
            <td><b>Jumlah</b></td>
            <td><b>Prioritas</b></td>
            <td><b>hasil</b></td>
            
        </tr>
        <tr>
            <td><b>IPA</b></td>
            <td><input type="text" disabled="true" id="nilai-nilai" value="<?php echo $matriksNilaiKriteriaPenjumlahan['nilai']['nilai']; ?>"></td>
            <td><input type="text" disabled="true" id="nilai-minat" value="<?php echo $matriksNilaiKriteriaPenjumlahan['nilai']['minat']; ?>"></td>
            <td><input type="text" disabled="true" id="nilai-psikotest" value="<?php echo $matriksNilaiKriteriaPenjumlahan['nilai']['psikotes']; ?>"></td>
            <td><input type="text" disabled="true" id="nilai-jumlah" value="<?php echo $matriksNilaiKriteriaPenjumlahan['jumlah']['nilai']; ?>"></td>
            <td><input type="text" disabled="true" id="nilai-prioritas" value="<?php echo $matriksNilaiKriteriaPenjumlahan['prioritas']['nilai']; ?>"></td>
            <td><input type="text" disabled="true" id="nilai-hasil" value="<?php echo $matriksNilaiKriteriaPenjumlahan['hasil']['nilai']; ?>"></td>
            
        </tr>
        <tr>
            <td><b>IPS</b></td>
            <td><input type="text" disabled="true" id="minat-nilai"  value="<?php echo $matriksNilaiKriteriaPenjumlahan['minat']['nilai']; ?>"></td>
            <td><input type="text" disabled="true" id="minat-minat"  value="<?php echo $matriksNilaiKriteriaPenjumlahan['minat']['minat']; ?>"></td>
            <td><input type="text" disabled="true" id="minat-psikotest"  value="<?php echo $matriksNilaiKriteriaPenjumlahan['minat']['psikotes']; ?>"></td>
            <td><input type="text" disabled="true" id="minat-jumlah" value="<?php echo $matriksNilaiKriteriaPenjumlahan['jumlah']['minat']; ?>"></td>
            <td><input type="text" disabled="true" id="minat-prioritas" value="<?php echo $matriksNilaiKriteriaPenjumlahan['prioritas']['minat']; ?>"></td>
            <td><input type="text" disabled="true" id="minat-hasil" value="<?php echo $matriksNilaiKriteriaPenjumlahan['hasil']['minat']; ?>"></td>
            
        </tr>
        <tr>
            <td><b>BAHASA</b></td>
            <td><input type="text" disabled="true" id="psikotets-nilai"  value="<?php echo $matriksNilaiKriteriaPenjumlahan['psikotes']['nilai']; ?>"></td>
            <td><input type="text" disabled="true" id="psikotets-minat"  value="<?php echo $matriksNilaiKriteriaPenjumlahan['psikotes']['minat']; ?>"></td>
            <td><input type="text" disabled="true" id="psikotets-psikotest"  value="<?php echo $matriksNilaiKriteriaPenjumlahan['psikotes']['psikotes']; ?>"></td>
            <td><input type="text" disabled="true" id="psikotets-jumlah" value="<?php echo $matriksNilaiKriteriaPenjumlahan['jumlah']['psikotes']; ?>"></td>
            <td><input type="text" disabled="true" id="psikotets-prioritas" value="<?php echo $matriksNilaiKriteriaPenjumlahan['prioritas']['psikotes']; ?>"></td>
            <td><input type="text" disabled="true" id="psikotets-hasil" value="<?php echo $matriksNilaiKriteriaPenjumlahan['hasil']['psikotes']; ?>"></td>
            
        </tr>        
        <tr>
            <td colspan="6"><b>Jumlah</b></td>
            <?php
            $hasilTotal = $matriksNilaiKriteriaPenjumlahan['hasil']['nilai']+$matriksNilaiKriteriaPenjumlahan['hasil']['minat']+$matriksNilaiKriteriaPenjumlahan['hasil']['psikotes'];
            ?>
            <td><input type="text" disabled="true" id="psikotets-hasil" value="<?php echo number_format($hasilTotal,2); ?>"></td>                        
        </tr>
        
    </table>
    
    <div class="col-md-4">    
    <table class="table">
        <tr>
            <th>Jumlah adalah </th>
            <th>
                <?php
                echo number_format($hasilTotal,2);
                ?>
            </th>
        </tr>
        <tr>
            <th>n atau IR adalah </th>
            <th>
                <?php
                $n = 3;
                $ir = 0.58;
                echo $n." atau ".$ir;
                ?>
            </th>
        </tr>
        <tr>
            <th>Lambda Max (Jumlah/n)adalah </th>
            <th>
                <?php
                $lambda = ($hasilTotal/3);
                echo number_format($lambda,2);
                ?>
            </th>
        </tr>
        <tr>
            <th>CI ((Lambda-n)/n) adalah </th>
            <th>
                <?php
                    $ci = (($lambda)-3)/3;
                    echo number_format($ci,2);
                ?>
            </th>
        </tr>
        <tr>
            <th>CR (CI/IR) adalah </th>
            <th>
                <?php
                    $cr = ($ci/0.58);
                    echo number_format($cr,2);
                ?>
            </th>
        </tr> 
        <tr>
            <th colspan="2">
                <?php
                    $nil = 0.1;
                    if($cr<$nil){
                        echo "Rasio Konsistensi diterima karena Nilai CR ".$cr." < ".$nil;
                    }else{
                        echo "Rasio Konsistensi Tidak diterima karena Nilai CR ".$cr." > ".$nil;
                    }
                ?>
            </th>            
        </tr>
        
    </table>
    </div>
    
</div>

<?php 
$urlk = Url::to('metode');

$script = <<<  JS

    $('body').on('click', 'a#hitung', function (event){
        var nilai = $("#nilai-nilai").val();
        alert(nilai);
        var link = $(this)    
        var href = 'index.php?r=kriteria/hitung-metode';//link.attr("href");
//        alert(href+''+$('form#form-metode').serialize());
        
                                $.ajax({
                                    url: href,
                                    type: "get",
                                    success: function(data) {                                        
                                        if(data.success==true){
                                            $(".bootbox").modal("hide")
                                            $.notify(data.message, data.alert);
                                            $.pjax.reload({container:"#barang-gridview"})
                                        }
                                        else{
                                            alert("Saved");
                                        }                
                                    }
                                });
                                
    });
        
JS;
$this->registerJs($script);
?>