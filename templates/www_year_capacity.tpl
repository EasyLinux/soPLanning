{* Graphique Utilisation des ressources *}
<svg class="graph" aria-labelledby="title desc" role="img">
  <title id="title">Utilisation des ressources</title>
  <desc id="desc"></desc>
  <g class="line">
    <line x1="60" x2="60" y1="5" y2="200"></line>
    <line x1="60" x2="1590" y1="200" y2="200"></line>
    <text x="10" y="100" dy=".35em">100%</text>
    <text x="25" y="190" dy=".35em">  0%</text>
    <text x="500" y="30" font-family="Verdana" font-size="1.4em">Utilisation des ressources</text>
  </g>
  
  <g class="grid">
    <line x1="60" x2="1590" y1="100" y2="100"></line>
  </g>
{assign var=Offset  value=70}  
{foreach from=$TabData.Months item=Month name=Month}
  <g class="line">
    <text x="{$Offset+10}" y="220" dy=".35em">{$Month}</text>
  </g>
<g class="bar">
  {foreach from=$TabData.Users item=User name=Users}
  <rect height="{$User.Percent[$smarty.foreach.Month.index]}" width="20" y="{$User.Height[$smarty.foreach.Month.index]}" x="{$Offset}" style="fill: #{$User.Color}"></rect>
  {assign var=Offset value=$Offset+20}
  {/foreach}
  {assign var=Offset value=$Offset+20}
  <rect height="100" width="2" y="100" x="{$Offset}" style="fill: #C0C0C0"></rect>
  {assign var=Offset value=$Offset+3}
</g>  
{/foreach}

  <g>
    <rect height="20" width="1700" y="240" x="50" style="fill: #DBDFF2"></rect>
    {assign var=Index value=0}
    {assign var=Y value=245}
    {foreach from=$TabData.Users item=User name=Legend}
      {assign var=X value=$Index*200+55}
      <rect height="10" width="10" y="{$Y}" x="{$X}" style="fill: #{$User.Color}"></rect>
      <text x="{$X+20}" y="{$Y+10}" font-family="Verdana" font-size="1em">{$User.Name}</text>
      {assign var=Index value=$Index+1}
      {if $Index>8}
         {assign var=Index value=0}
         {assign var=Y value=$Y+20}
         <rect height="20" width="1700" y="{$Y-5}" x="50" style="fill: #DBDFF2"></rect>
      {/if}
    {/foreach}
  </g>
</svg>


