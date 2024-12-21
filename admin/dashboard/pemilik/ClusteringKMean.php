<?php
class ClusteringKMean {
      private $n_objek = array();
      private $objek1 = array();
      private $objek2 = array();
      private $objek3 = array();
      private $objek = array();
      private $centroidCluster = null;
      private $cekObjCluster = null;
      private $ceknObjCluster = null;
      private $cek1ObjCluster = null;
      private $cek2ObjCluster = null;
      private $cek3ObjCluster = null;
      
      public function __construct($n_obj,$obj1,$obj2,$obj3,$obj,$cnt) {
            $this->centroidCluster = $cnt;
            for ($i=0;$i<count($obj);$i++){
                  $this->objek[$i] = new objek($obj[$i]);
				  $this->cekObjCluster[$i] = 0;
            }
            for ($j=0;$j<count($n_obj);$j++){
                  $this->n_objek[$j] = new objek($n_obj[$j]);
				  $this->ceknObjCluster[$j] = 0;
            }
            for ($j=0;$j<count($obj1);$j++){
                  $this->objek1[$j] = new objek($obj1[$j]);
				  $this->cek1ObjCluster[$j] = 0;
            }
            for ($j=0;$j<count($obj2);$j++){
                  $this->objek2[$j] = new objek($obj2[$j]);
				  $this->cek2ObjCluster[$j] = 0;
            }
            for ($j=0;$j<count($obj3);$j++){
                  $this->objek3[$j] = new objek($obj3[$j]);
				  $this->cek3ObjCluster[$j] = 0;
            }
      }
      
      public function setClusterObjek($itr){               
            echo "<table class='table table-bordered table-hover' width='100%' cellspacing='0'>
                        <tr class='bg-gradient-dark text-light text-center'><th colspan='100'>ITERASI ".$itr."</th></tr>
						<tr class='bg-gradient-dark text-light'><th>Nama Produk</th>";            
            
                  echo "<th>Stok Awal</th>";
                  echo "<th>Stok Keluar</th>";
                  echo "<th>Stok Akhir</th>";
                  echo "<th>Cluster</th>";
            echo "</tr>";  
            
            for ($i=0;$i<count($this->objek);$i++){
                  $this->objek[$i]->setCluster($this->centroidCluster);
                  for ($j=0;$j<count($this->n_objek[$i]->data);$j++)
                        echo "<tr><td>".$this->n_objek[$i]->data[$j]."</td>";                  
                  for ($j=0;$j<count($this->objek1[$i]->data);$j++)
                        echo "<td>".$this->objek1[$i]->data[$j]."</td>";
                  for ($j=0;$j<count($this->objek2[$i]->data);$j++)
                        echo "<td>".$this->objek2[$i]->data[$j]."</td>";
                  for ($j=0;$j<count($this->objek3[$i]->data);$j++)
                        echo "<td>".$this->objek3[$i]->data[$j]."</td>";
                  
                              if ($j == $this->objek[$i]->getCluster())
                                    echo "<td>Laris</td>";
                              else  echo "<td>Tidak Laris</td>";
                  echo "</tr>";
            }
            echo "</table><br><br>";            

            $cek = TRUE;
            for ($i=0;$i<count($this->cekObjCluster);$i++){
                  if ($this->cekObjCluster[$i]!=$this->objek[$i]->getCluster()){
                        $cek = FALSE;
                        break;
                  }
            }            
            for ($i=0;$i<count($this->ceknObjCluster);$i++){
                  if ($this->ceknObjCluster[$i]!=$this->n_objek[$i]->getCluster()){
                        $cek = FALSE;
                        break;
                  }
            } 
           if ((!($cek))&&($itr<20)){
                  for ($i=0;$i<count($this->cekObjCluster);$i++){
                        $this->cekObjCluster[$i] = $this->objek[$i]->getCluster();
                  }
                  $this->setClusterObjek($itr+1);
            }else{      
                        echo "<div class='alert alert-primary' role='alert'>
                        Berikut merupakan hasil akhir dari analisis <strong>K-Means Clustering</strong> dan beserta pembagian kelompoknya
                      </div>
                        <hr><table class='table table-bordered table-hover' width='100%' id='dataTable' cellspacing='0'>
                        <tr class='bg-gradient-dark text-light text-center'><th colspan='100'>Hasil</th></tr>
						<tr class='bg-gradient-dark text-light'><th>Nama Pelanggan</th>";  

                                    echo "<th>Stok Awal</th>";
                                    echo "<th>Stok Keluar</th>";
                                    echo "<th>Stok Akhir</th>";
                                    echo "<th>Cluster</th>";
                        echo "</tr>";  
                        
                        for ($i=0;$i<count($this->objek);$i++){
                              $this->objek[$i]->setCluster($this->centroidCluster);
                              for ($j=0;$j<count($this->n_objek[$i]->data);$j++)
                                    echo "<tr><td>".$this->n_objek[$i]->data[$j]."</td>";                  
                                    for ($j=0;$j<count($this->objek1[$i]->data);$j++)
                                          echo "<td>".$this->objek1[$i]->data[$j]."</td>";
                                    for ($j=0;$j<count($this->objek2[$i]->data);$j++)
                                          echo "<td>".$this->objek2[$i]->data[$j]."</td>";
                                    for ($j=0;$j<count($this->objek3[$i]->data);$j++)
                                          echo "<td>".$this->objek3[$i]->data[$j]."</td>";
                              
                                          if ($j == $this->objek[$i]->getCluster())
                                          echo "<td>Laris</td>";
                                    else  echo "<td>Tidak Laris</td>";
                        echo "</tr>";
                        }
                        echo "</table><br><br>";          
			}         
      }
      
      private function setCentroidCluster(){
           for ($i=0;$i<count($this->centroidCluster);$i++){
                 $countObj = 0;
                 $x = array(); 
               
                 for ($j=0;$j<count($this->objek);$j++){
                       if ($this->objek[$j]->getCluster()==$i){
                             for ($k=0;$k<count($this->objek[$j]->data);$k++){
                                    $x[$k] += $this->objek[$j]->data[$k];
							 }
                             $countObj++;
                       }
                       return $objek[$j] ?? null;
                 }
                 for ($k=0;$k<count($this->centroidCluster[$i]);$k++){
					   if ($countObj>0)
							$this->centroidCluster[$i][$k] = $x[$k]/$countObj;
					   else{
							echo "<font color='red'>Terdapat ketidak sesuai Nilai Awal Cluster</font><br>";
							break;
					   }						
                 }
           } 
      }      
}

?>