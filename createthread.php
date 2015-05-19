<?php

include("forumconnect.php"); ?>
<body ui-view>
<h2>Creating thread</h2>

 <form method=post action="threadcreationattempt.php">
<b>Title:</b><br>
<input type=text size=40 name=title required><br>

<b>Discussion:</b><br>
<textarea name=discussion cols=40 rows=10 wrap=virtual required></textarea><br>

<input type=submit name=submit value="Submit">
<input type=reset name=reset value="Start Over">

</form>
<input type='button' value='Go back'
                      ui-sref='forum'/>
</body>