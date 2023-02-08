<!DOCTYPE html>
<head><title>Jeanette Skaarup MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash
of a four digit pin and 
attempts to hash all four digit combinations
to determine the original four digits.</p>
<pre>
Debug Output:
<?php
$goodtext = "Not found";
// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // This is our number range
    $txt = "0123456789";
    $show = 10;

    // Outer loop to go through the numbers for the
    // first position in our "possible" pre-hash
    // text
    for($i=0; $i<strlen($txt); $i++ ) {
        $n1 = $txt[$i];   // The first of four digits
        
        // Our inner loop. Note the use of new variables
        // $j and $n2 
        for($j=0; $j<strlen($txt); $j++ ) {
            $n2 = $txt[$j];  // Our second digit

        // Our inner loop. Note the use of new variables
        // $k and $n3 
        for($k=0; $k<strlen($txt); $k++ ) {
            $n3 = $txt[$k];  // Our third digits

            
        // Our inner loop. Note the use of new variables
        // $l and $n4 
        for($l=0; $l<strlen($txt); $l++ ) {
            $n4 = $txt[$l];  // Our fourth digit


            // Concatenate the four digits together to 
            // form the "possible" pre-hash text
            $try = $n1.$n2.$n3.$n4;

            // Run the hash and then check to see if we match
            $check = hash('md5', $try);
            if ( $check == $md5 ) {
                $goodtext = $try;
                break;   // Exit the inner loop
            }

            // Debug output until $show hits 0
            if ( $show > 0 ) {
                print "$check $try\n";
                $show = $show - 1;
            }
        }
      }
     }
    }
    // Compute elapsed time
    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p>Original Text: <?= htmlentities($goodtext); ?></p>
<form method="GET">
<input type="text" name="md5" size="60" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="makecode.php">MD5 Code Maker</a></li>
</ul>
</body>
</html>
