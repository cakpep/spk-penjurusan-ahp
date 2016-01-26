<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Kriteria */

$this->title = 'Metode';
$this->params['breadcrumbs'][] = ['label' => 'Kriterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kriteria-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>Matriks Perbandingan</h3>
    <form id="form-metode">
        
    <table class="table table-bordered">
        <tr>
            <td>&nbsp;</td>
            <td><b>Nilai</b></td>
            <td><b>Minat</b></td>
            <td><b>Psikotest</b></td>
        </tr>
        <tr>
            <td><b>Nilai</b></td>
            <td><input type="text" id="nilai-nilai" value="<?php echo $data['nilai']['nilai']; ?>"></td>
            <td><input type="text" id="nilai-minat" value="<?php echo $data['nilai']['minat']; ?>"></td>
            <td><input type="text" id="nilai-psikotest" value="<?php echo $data['nilai']['psikotes']; ?>"></td>
        </tr>
        <tr>
            <td><b>Minat</b></td>
            <td><input type="text" id="minat-nilai" disabled="" value="<?php echo $data['minat']['nilai']; ?>"></td>
            <td><input type="text" id="minat-minat" disabled="" value="<?php echo $data['minat']['minat']; ?>"></td>
            <td><input type="text" id="minat-psikotest" disabled="" value="<?php echo $data['minat']['psikotes']; ?>"></td>
        </tr>
        <tr>
            <td><b>Psikotest</b></td>
            <td><input type="text" id="psikotets-nilai" disabled="" value="<?php echo $data['psikotes']['nilai']; ?>"></td>
            <td><input type="text" id="psikotets-minat" disabled="" value="<?php echo $data['psikotes']['minat']; ?>"></td>
            <td><input type="text" id="psikotets-psikotest" disabled="" value="<?php echo $data['psikotes']['psikotes']; ?>"></td>
        </tr>
        <tr>
            <td><b>Jumlah</b></td>
            <td><input type="text" id="jumlah-nilai" disabled="" value="<?php echo $data['jumlah']['nilai']; ?>"></td>
            <td><input type="text" id="jumlah-minat" disabled="" value="<?php echo $data['jumlah']['minat']; ?>"></td>
            <td><input type="text" id="jumlah-psikotest" disabled="" value="<?php echo $data['jumlah']['psikotes']; ?>"></td>
        </tr>
        
    </table>
        <!--<a href="#" class="btn btn-primary " id="hitung">Hitung</a>-->
        <!--<? Html::a('Hitung', ['metode?ajax=1'], ['class' => 'btn btn-success','id'=>'hitung']) ?>-->
    </form>
    
    
    <h3>Matriks Nilai Kriteria</h3>
    <table class="table table-bordered">
        <tr>
            <td>&nbsp;</td>
            <td><b>Nilai</b></td>
            <td><b>Minat</b></td>
            <td><b>Psikotest</b></td>
            <td><b>Jumlah</b></td>
            <td><b>Prioritas</b></td>
        </tr>
        <tr>
            <td><b>Nilai</b></td>
            <td><input type="text" id="nilai-nilai" value="<?php echo $matriksNilaiKriteria['nilai']['nilai']; ?>"></td>
            <td><input type="text" id="nilai-minat" value="<?php echo $matriksNilaiKriteria['nilai']['minat']; ?>"></td>
            <td><input type="text" id="nilai-psikotest" value="<?php echo $matriksNilaiKriteria['nilai']['psikotes']; ?>"></td>
            <td><input type="text" id="nilai-jumlah" value="<?php echo $matriksNilaiKriteria['jumlah']['nilai']; ?>"></td>
            <td><input type="text" id="nilai-prioritas" value="<?php echo $matriksNilaiKriteria['prioritas']['nilai']; ?>"></td>
        </tr>
        <tr>
            <td><b>Minat</b></td>
            <td><input type="text" id="minat-nilai" disabled="" value="<?php echo $matriksNilaiKriteria['minat']['nilai']; ?>"></td>
            <td><input type="text" id="minat-minat" disabled="" value="<?php echo $matriksNilaiKriteria['minat']['minat']; ?>"></td>
            <td><input type="text" id="minat-psikotest" disabled="" value="<?php echo $matriksNilaiKriteria['minat']['psikotes']; ?>"></td>
            <td><input type="text" id="minat-jumlah" value="<?php echo $matriksNilaiKriteria['jumlah']['minat']; ?>"></td>
            <td><input type="text" id="minat-prioritas" value="<?php echo $matriksNilaiKriteria['prioritas']['minat']; ?>"></td>
        </tr>
        <tr>
            <td><b>Psikotest</b></td>
            <td><input type="text" id="psikotets-nilai" disabled="" value="<?php echo $matriksNilaiKriteria['psikotes']['nilai']; ?>"></td>
            <td><input type="text" id="psikotets-minat" disabled="" value="<?php echo $matriksNilaiKriteria['psikotes']['minat']; ?>"></td>
            <td><input type="text" id="psikotets-psikotest" disabled="" value="<?php echo $matriksNilaiKriteria['psikotes']['psikotes']; ?>"></td>
            <td><input type="text" id="psikotets-jumlah" value="<?php echo $matriksNilaiKriteria['jumlah']['psikotes']; ?>"></td>
            <td><input type="text" id="psikotets-prioritas" value="<?php echo $matriksNilaiKriteria['prioritas']['psikotes']; ?>"></td>
        </tr>        
        
    </table>
    
    <h3>Matriks Penjumlahan Setiap Baris</h3>
    <table class="table table-bordered">
        <tr>
            <td>&nbsp;</td>
            <td><b>Nilai</b></td>
            <td><b>Minat</b></td>
            <td><b>Psikotest</b></td>
            <td><b>Jumlah</b></td>
            <td><b>Prioritas</b></td>
            <td><b>hasil</b></td>
            
        </tr>
        <tr>
            <td><b>Nilai</b></td>
            <td><input type="text" id="nilai-nilai" value="<?php echo $matriksNilaiKriteriaPenjumlahan['nilai']['nilai']; ?>"></td>
            <td><input type="text" id="nilai-minat" value="<?php echo $matriksNilaiKriteriaPenjumlahan['nilai']['minat']; ?>"></td>
            <td><input type="text" id="nilai-psikotest" value="<?php echo $matriksNilaiKriteriaPenjumlahan['nilai']['psikotes']; ?>"></td>
            <td><input type="text" id="nilai-jumlah" value="<?php echo $matriksNilaiKriteriaPenjumlahan['jumlah']['nilai']; ?>"></td>
            <td><input type="text" id="nilai-prioritas" value="<?php echo $matriksNilaiKriteriaPenjumlahan['prioritas']['nilai']; ?>"></td>
            <td><input type="text" id="nilai-hasil" value="<?php echo $matriksNilaiKriteriaPenjumlahan['hasil']['nilai']; ?>"></td>
            
        </tr>
        <tr>
            <td><b>Minat</b></td>
            <td><input type="text" id="minat-nilai" disabled="" value="<?php echo $matriksNilaiKriteriaPenjumlahan['minat']['nilai']; ?>"></td>
            <td><input type="text" id="minat-minat" disabled="" value="<?php echo $matriksNilaiKriteriaPenjumlahan['minat']['minat']; ?>"></td>
            <td><input type="text" id="minat-psikotest" disabled="" value="<?php echo $matriksNilaiKriteriaPenjumlahan['minat']['psikotes']; ?>"></td>
            <td><input type="text" id="minat-jumlah" value="<?php echo $matriksNilaiKriteriaPenjumlahan['jumlah']['minat']; ?>"></td>
            <td><input type="text" id="minat-prioritas" value="<?php echo $matriksNilaiKriteriaPenjumlahan['prioritas']['minat']; ?>"></td>
            <td><input type="text" id="minat-hasil" value="<?php echo $matriksNilaiKriteriaPenjumlahan['hasil']['minat']; ?>"></td>
            
        </tr>
        <tr>
            <td><b>Psikotest</b></td>
            <td><input type="text" id="psikotets-nilai" disabled="" value="<?php echo $matriksNilaiKriteriaPenjumlahan['psikotes']['nilai']; ?>"></td>
            <td><input type="text" id="psikotets-minat" disabled="" value="<?php echo $matriksNilaiKriteriaPenjumlahan['psikotes']['minat']; ?>"></td>
            <td><input type="text" id="psikotets-psikotest" disabled="" value="<?php echo $matriksNilaiKriteriaPenjumlahan['psikotes']['psikotes']; ?>"></td>
            <td><input type="text" id="psikotets-jumlah" value="<?php echo $matriksNilaiKriteriaPenjumlahan['jumlah']['psikotes']; ?>"></td>
            <td><input type="text" id="psikotets-prioritas" value="<?php echo $matriksNilaiKriteriaPenjumlahan['prioritas']['psikotes']; ?>"></td>
            <td><input type="text" id="psikotets-hasil" value="<?php echo $matriksNilaiKriteriaPenjumlahan['hasil']['psikotes']; ?>"></td>
            
        </tr>        
        <tr>
            <td colspan="6"><b>Jumlah</b></td>
            <?php
            $hasilTotal = $matriksNilaiKriteriaPenjumlahan['hasil']['nilai']+$matriksNilaiKriteriaPenjumlahan['hasil']['minat']+$matriksNilaiKriteriaPenjumlahan['hasil']['psikotes'];
            ?>
            <td><input type="text" id="psikotets-hasil" value="<?php echo number_format($hasilTotal,2); ?>"></td>                        
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