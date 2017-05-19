			<div class="panel-group" id="panel-9999">
{foreach from=$Datas.Weeks item=Week}
				<div class="panel panel-default">
					<div class="panel-heading">
						 <a class="panel-title" data-toggle="collapse" data-parent="#panel-9999" href="#panel-element-{$Week.Id}">{$Week.Title}</a>
					</div>
					<div id="panel-element-{$Week.Id}" class="panel-collapse collapse">
						<div class="panel-body">
	{foreach from=$Week.Days item=Day}						
              <div class="panel panel-default">
                <div class="panel-heading">
                   <a class="panel-title" data-toggle="collapse" 
                      data-parent="#panel-{$Day.wDay}" 
                      href="#panel-element-{$Day.wDay}">
                     {$Day.sDay} {$Day.wDay|substr:0:2} 
                     <span style='color: #1db0dc'>{$Day.Task.Project}</span></a>
                </div>
                <div id="panel-element-{$Day.wDay}" class="panel-collapse collapse">
                  <div class="panel-body">
                    {if $Day.Task.Project != ""}
                    <div class="row">
                      <div class="col-md-4"><b>Projet: </b></div><div class="col-md-8">{$Day.Task.Project}</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4"><b>Adresse/Coordonn&eacute;es:</b></div><div class="col-md-8">{$Day.Task.Task}</div>
                    </div>
                    <div class="row">
                      <div class="col-md-4"><b>Descriptif des travaux:</b></div><div class="col-md-8">{$Day.Task.Comment}</div>
                    </div>
                    {else}
                    <div class="row">
                      <div class="col-md-12">Rien de pr&eacute;vu</div>
                    </div>
                    {/if}
                  </div>
                </div>
              </div>
  {/foreach}
            </div>
					</div>
        </div>
{/foreach}        
        
        
			</div>
