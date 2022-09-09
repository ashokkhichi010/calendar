
	function showDate(id){
		// var x = sessionStorage.getItem('date');		//this is session storage;
		document.getElementById('showDate').innerHTML = id;
		// document.getElementById(x).style.backgroundColor = '';
		// document.getElementById(id).style.backgroundColor = 'lightblue';
		// sessionStorage.setItem('date', id);	
	}

	function select(id){
		if (id == 'year') {
			document.getElementById('years').style.display = 'block';
			document.getElementById('months').style.display = 'none';
		}else if(id == 'month'){
			document.getElementById('years').style.display = 'none';
			document.getElementById('months').style.display = 'block';
		}
		else{
			document.getElementById('showDate').innerHTML = id;
		}
		document.getElementById('heading').style.display = 'none';
		document.getElementById('day').style.display = 'none';
		sessionStorage.previousId = id;
	}

	var date = new Date();
	var currentYear = date.getFullYear();
	var currentMonth = date.getMonth()+1;
	var currentDay = date.getDate();

	currentBackground = 'blue';
	currentColor = 'white';

	document.getElementById(currentYear+'-'+currentMonth+'-'+currentDay).style.backgroundColor = currentBackground;
	document.getElementById(currentYear+'-'+currentMonth+'-'+currentDay).style.color = currentColor;
	document.getElementById(currentMonth).style.backgroundColor = currentBackground;
	document.getElementById(currentMonth).style.color = currentColor;	
	document.getElementById(currentYear).style.backgroundColor = currentBackground;
	document.getElementById(currentYear).style.color = currentColor;
