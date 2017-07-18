<?php
$score=0;
for($i=1;$i<=@$_POST["line"];$i++)
{
	If(@$_POST["c$i"] == @$_POST["answer$i"])
	{
			$score=$score+1;
	}
}
echo "True $score<br>";
?>