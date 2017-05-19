/*
 * This function is called when a user click on a calendar day
 * day is toggled between working/holiday
 * 
 * Database update is done thru Ajax with delSelect and addSelect function
 */
function ToggleException(oDay)
{
  minicalUseable = parseInt(document.getElementById('minicalUseable').innerHTML);
  if( oDay.className.includes("minical-week-end"))
  {
    oDay.className = "minical-day";
    minicalUseable++;
    delSelect(oDay.id.substr(6,2));
  } 
  else
  {
    oDay.className = "minical-day minical-week-end";
    minicalUseable--;
    addSelect(oDay.id.substr(6,2));
  }     
  if( oDay.id.substr(9,1) == "T")
    oDay.className += " minical-today";
  document.getElementById('minicalUseable').innerHTML = minicalUseable;
 }

/*
 * Display next month, data are 
 */
function minicalNext()
{
  minical = document.getElementById("minical").value;
  minicalYear = parseInt(minical.substr(0,4));
  minicalMonth = parseInt(minical.substr(4,2));
  if( minicalMonth == 12)
  {
    minicalMonth=1;
    minicalYear++;
  }
  else
    minicalMonth++;
  if( minicalMonth > 9 )
    minical = minicalYear.toString() + minicalMonth.toString();
  else
    minical = minicalYear.toString() + '0' + minicalMonth.toString();
  document.getElementById("minical").value = minical;

  updateCalendar(minical);
  updateUseable(minical);
  updateExceptionDisplay(minical);
  
}

/*
 * Display previous month
 */
function minicalPrev()
{
  minical = document.getElementById("minical").value;
  minicalYear = parseInt(minical.substr(0,4));
  minicalMonth = parseInt(minical.substr(4,2));
  if( minicalMonth == 1)
  {
    minicalMonth=12;
    minicalYear--;
  }
  else
    minicalMonth--;
  if( minicalMonth > 9 )
    minical = minicalYear.toString() + minicalMonth.toString();
  else
    minical = minicalYear.toString() + '0' + minicalMonth.toString();
  document.getElementById("minical").value = minical;

  updateCalendar(minical);
  updateUseable(minical);
  updateExceptionDisplay(minical);
}

/*
 * Call ajax to update table planning_user_exception
 */
function addSelect(Day)
{
  Idx=0;
  Opt = document.getElementById('listExeptionDays');
  var newDay = document.createElement("option");
  minical = document.getElementById("minical").value;
  UserId = document.getElementById('user_id_origine').value;
  
  newDay.text = Day + "/"+ minical.substr(4,2)+"/" + minical.substr(0,4);
  newDay.value = Day;
  
  updateException("addException",UserId,parseInt(minical+Day));
}

function delSelect(Day)
{
  Idx=0;
  Opt = document.getElementById('listExeptionDays');
  UserId = document.getElementById('user_id_origine').value;
  minical = document.getElementById("minical").value;
  
  updateException("delException",UserId,parseInt(minical+Day));
}

// open(method, url, async) async = true pour asynchrone
function updateException(Action,userID,Day) 
{
  var xhttp = new XMLHttpRequest();
  
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     updateExceptionDisplay();
    }
  };
  xhttp.open("POST", "process/ajax.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("Action="+Action+"&UserId="+userID+"&Day="+Day);
} 


function updateCalendar(YearMonth)
{
  var xhttp = new XMLHttpRequest();
  UserId = document.getElementById('user_id_origine').value;
  
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById('minicalContent').innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "process/ajax.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("Action=updateCalendar&YearMonth="+YearMonth+"&UserId="+encodeURI(UserId));
}

function updateUseable(YearMonth)
{
  var xhttp = new XMLHttpRequest();
  UserId = document.getElementById('user_id_origine').value;
  
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById('minicalUseable').innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "process/ajax.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("Action=updateUseable&YearMonth="+YearMonth+"&UserId="+encodeURI(UserId));
}

function updateExceptionDisplay()
{
  var xhttp = new XMLHttpRequest();
  
  UserId = document.getElementById('user_id_origine').value;
  YearMonth = document.getElementById("minical").value;
  
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     var Opt = document.getElementById('listExeptionDays');
     for(i=Opt.length ; i>=0 ; i--)
       Opt.remove(i);
     var Options = JSON.parse(this.responseText);
     Options.forEach(fillSelect);
     
    }
  };
  xhttp.open("POST", "process/ajax.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("Action=updateExceptionDisplay&YearMonth="+YearMonth+"&UserId="+encodeURI(UserId));
}

function fillSelect(Item, index)
{
  Idx=0;
  Opt = document.getElementById('listExeptionDays');
  var newDay = document.createElement("option");
  minical = document.getElementById("minical").value;
  
  newDay.text = Item + "/"+ minical.substr(4,2)+"/" + minical.substr(0,4);
  newDay.value = Item;
  
  Opt.add(newDay,index);
}