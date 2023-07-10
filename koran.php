<!DOCTYPE html>
<html>
  <head>
    <title>Kraepelin Test Web</title>
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }
      td {
        border: 1px solid black;
        height: 20px;
        width: 20px;
        text-align: center;
        vertical-align: middle;
      }
      .answer {
        border: none;
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0;
        text-align: center;
        font-size: 16px;
        font-weight: bold;
      }
      .disabled {
        pointer-events: none;
        background-color: #ddd;
      }
    </style>
  </head>
  <body>
    <table>
      <?php
        for ($i = 1; $i <= 45; $i++) {
          echo "<tr>";
          for ($j = 1; $j <= 20; $j++) {
            $number = rand(1, 9);
            $numbers[$i][$j]=$number;
            echo "<td>" . $number . "</td>";
          }
          echo"<tr>";
          for ($k = 1; $k <= 20; $k++) {
            if($i<>45){
            echo "<td><input type='text' class='answer' disabled pattern='[1-9]'></td>";
            }
          }
          echo"</tr>";
          echo "</tr>";
        }
      ?>
    </table>
    <script>
      const inputs = document.querySelectorAll('.answer');
      inputs[0].removeAttribute('disabled');
      inputs[0].focus();
      inputs.forEach((input, index) => {
        input.addEventListener('input', () => {
          const nextIndex = index + 1;
          const prevIndex = index - 1;
          const isValid = /^[1-9,0]$/.test(input.value);
          if (isValid) {
            if (nextIndex < inputs.length) {
              input.setAttribute('disabled', '');
              inputs[nextIndex].removeAttribute('disabled');
              inputs[nextIndex].focus();
            }
          } else {
            input.value = '';
            alert('Please enter a number between 1 and 9.');
          }
        });
      });

    </script>
  </body>
</html>
<?php
$jawaban='';
for($klm=1;$klm<=44;$klm++){
    for($kl=1;$kl<=20;$kl++){
        $jawaban.= substr(strval($numbers[$klm][$kl]+$numbers[$klm+1][$kl]), -1);
    }
    $jawab=str_split($jawaban);
    }
    ?>
<script>
  setTimeout(() => {
    let values = '';
    let inputs = document.querySelectorAll('input'); // assuming inputs are HTML input elements
    inputs.forEach(input => {
      if (input.value === '') {
        values += 'd';
      } else {
        values += input.value;
      }
    });
    let kunci = values.split("");
    let jawab = <?php echo json_encode($jawab); ?>; // added to pass values from PHP
    let benar = 0; // declare and initialize the variable to 0
    for (let i = 0; i < kunci.length; i++) {
      if (kunci[i] == jawab[i]) { // checking for matching elements
        benar += 1; // update the value of 'benar'
      }
    }
    
    // new code to post the value of 'benar' to 'selesai.php'
    const xhr = new XMLHttpRequest();
    const url = 'selesai.php';
    const params = `benar=${benar}`;
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        console.log(xhr.responseText);
        window.location.href = `selesai.php?m=${encodeURIComponent(benar)}&nama=${encodeURIComponent('<?php echo $_GET["nama"]; ?>')}&kelas=${encodeURIComponent('<?php echo $_GET["kelas"]; ?>')}`;
      }
    };
    xhr.send(params);

  }, 5000);
</script>


