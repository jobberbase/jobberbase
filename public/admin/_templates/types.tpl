{include file="header.tpl"}
		<div id="content">
				<h3 class="page-heading">Job Types</h3>
				<div id="typesContainer">
				<strong>Note:</strong> Var name must not contain spaces or other special chars.<br />
				The icon is named icon_varname.png and has to be uploaded in the  
				'img' subdirectory situated in your themes directory under '_templates' folder.<br />
				{section name=tmp loop=$types}
					<div class="typeItem" rel="{$types[tmp]->getId()}">
						<div class="typeHandle"></div>
						<div class="typeWrapper">
							<a href="#" title="Delete" class="deleteType"><img src="{$BASE_URL_ADMIN}img/icon-delete.png" alt="Edit" /> Delete</a>
							<label><span>Name:</span><input type="text" size="60" name="name[{$types[tmp]->getId()}]" value="{$types[tmp]->getName()}" /></label>
							<a href="#" title="Save" class="saveType"><img src="{$BASE_URL_ADMIN}img/disk.png" alt="Save" /> Save</a>
							<label><span>Var name:</span><input type="text" size="60" id="nr" name="var_name[{$types[tmp]->getId()}]" value="{$types[tmp]->getVarName()}" /></label>
							<div class="clear"></div>
						</div>
					</div>
				{/section}
				</div>
				<p></p>
				<p>
					<a href="#" title="Add new type"><img src="{$BASE_URL_ADMIN}img/add.png" alt="Add new job type" /> Add new job type</a></p>
		</div><!-- #content -->

{include file="footer.tpl"}