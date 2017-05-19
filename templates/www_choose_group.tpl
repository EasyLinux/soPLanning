{* Smarty *}

<div class="row">
  <div class="col-md-5">
    <div class="form-group">
      <label for="sel1">{#options_popup_avail#}</label>
      <select class="form-control" id="grpAvail" size='10'>
        {foreach item=grp from=$grpAvail}
        <option ondblclick='addGroup("{$grp}");'>{$grp}</option>
        {/foreach}
      </select>
    </div>
  </div>
  <div class="col-md-2">

  </div> 
  <div class="col-md-5">
    <div class="form-group">
      <label for="sel1">{#options_popup_used#}</label>
      <select class="form-control" id="grpEnabled" size='10'>
        {foreach item=grpE from=$grpEnabled}
        <option ondblclick='delGroup("{$grpE}");'>{$grpE}</option>
        {/foreach}
      </select>
    </div>
  </div>
</div>
