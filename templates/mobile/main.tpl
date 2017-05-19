{include file="mobile/header.tpl"}
  <div class="container-fluid">
    <form class="form-horizontal" role="form" action"index.php" method="post" id='Main'>
	<div class="row">
		<div class="col-md-12">
			<button type="button" class="btn btn-primary btn-block" onclick='Logout();'>
				Quitter
			</button>      
		</div>
  </div>
	<div class="row">
		<div class="col-md-12">
      <h2 id='myName'>{$Datas.name}</h2>    
		</div>
  </div>
	<div class="row">
    <div class="col-md-12">

				<div class="btn-group dropdown">
					<button class="btn btn-default">
						Choisir la personne
					</button>
  				<button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
    				<span class="caret"></span>
      		</button>
  				<ul class="dropdown-menu">
          {foreach from=$Datas.Users item=User}
    				<li>
      				<a href="#" onclick="changeUser('{$User.uid}','{$User.name}');">{$User.name}</a>
            </li>
          {/foreach}
          </ul>
        </div>

    </div>
  </div>
	<div class="row">    
    <div class="col-md-12" id="Weeks">{include file="mobile/weeks.tpl"}
		</div>
	</div>
    <input type='hidden' name='action' id='action' value='' />
    <input type='hidden' name='user' id='user' value='' />
  </form>
</div>
{literal}
<script type='text/javascript'>
  function Logout()
  {
    document.getElementById('action').value='logout';
    document.getElementById('Main').submit();
  }
  
  function changeUser(User, Name)
  {
    var xhttp = new XMLHttpRequest();
    document.getElementById('myName').innerHTML=Name;
    
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("Weeks").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "index.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("action=user&user="+User);
  
  }
</script>
{/literal}
{include file="mobile/footer.tpl"}