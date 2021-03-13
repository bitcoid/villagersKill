<?php
function villagers($jumlah, $kill=''){
		// nilai awal 
		$angka_pertama = 0;
		$angka_kedua = 1;

		//menyimpan string angka pertama
		$hasil = "$angka_kedua + ";
		$total = array();  
		for ($i=0; $i<$jumlah-1; $i++) {
			// menghitung angka  
			$output = $angka_kedua + $angka_pertama;
			// hasilnya akan ditambahkan ke string $hasil
			$hasil = $hasil."$output +"; 

			//masukan angka untuk dilakuakn perhitungan berikutnya 
			$angka_pertama = $angka_kedua;
			$angka_kedua = $output; 
			$total[$i] = $angka_pertama;
			$total[$i+1] = $angka_kedua;
		} 
		if($kill == 'tables')
			return rtrim($hasil, "+ ").'='. array_sum(@$total); 
		else
			return array_sum(@$total);;
	}
	function villagers_kill($tingkat){
		for($i=1; $i<$tingkat+1; $i++){
			echo 'On the '.$i.' nd year she kills ';
			echo  villagers($i, 'tables') .' villagers';
			echo "<br>";
		}
	}
	//masukkan angka villagers
	villagers_kill(20);
?>
<p>
<form method="get">
Person A: Age of death = <input type="text" name="age_a" value="<?php echo @$_GET['age_a'];?>">, Year of Death = <input type="text" name="year_a" value="<?php echo @$_GET['year_a'];?>"> <br><br>
Person B: Age of death = <input type="text" name="age_b" value="<?php echo @$_GET['age_b'];?>">, Year of Death = <input type="text" name="year_b" value="<?php echo @$_GET['year_b'];?>">
<button type="submit" name="submit">Find Answer</button>
</form>

<b>Answer:</b>
<?php
if((@$_GET['year_a'] < 0 || @$_GET['age_a'] < 0) || (@$_GET['year_b'] < 0 || @$_GET['age_b'] < 0)){
	echo 'negative age, person who born before the witch took control';
}else{
	$person_a = @$_GET['year_a'] - @$_GET['age_a'];
	$person_b = @$_GET['year_b'] - @$_GET['age_b'];	
?>
	<br>

	Person A born on Year = <?php echo @$_GET['year_a'];?> – <?php echo @$_GET['age_a'];?> = <?php echo $person_a;?>, number of people killed on year <?php echo $person_a;?> is <?php echo villagers($person_a);?>. <br>
	Person B born on Year = <?php echo @$_GET['year_b'];?> – <?php echo @$_GET['age_b'];?> = <?php echo $person_b;?>, number of people killed on year <?php echo $person_b;?> is <?php echo villagers($person_b);?>.
	<br>
	<?php
	 $sAv= (villagers($person_a) + villagers($person_b)) / 2;
	?>
	So the average is (  <?php echo villagers($person_a);?> +  <?php echo  villagers($person_b);?> )/ 2 = <?php echo $sAv;?>
<?php 
}
?>
</p>