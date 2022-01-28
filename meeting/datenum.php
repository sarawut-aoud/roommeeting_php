	<?php
	function dateDiff($ev_startdate, $ev_enddate, $differenceFormat = '%R%a ') {
		$date1 = date_create($ev_startdate);
		$date2 = date_create($ev_enddate);

		$diff = date_diff($date1, $date2);
		return $diff->format($differenceFormat);
	}
	?>