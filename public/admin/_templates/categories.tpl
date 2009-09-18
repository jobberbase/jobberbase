{include file="header.tpl"}
		<div id="content">
				<h3 class="page-heading">Categories</h3>
				<div id="categoriesContainer">
				{foreach from=$categories item=category}
					<div class="categoryItem" rel="{$category.id}">
						<div class="categoryHandle"></div>
						<div class="categoryWrapper">
							<a href="#" title="Delete" class="deleteCategory"><img src="{$BASE_URL_ADMIN}img/icon-delete.png" alt="Edit" /> Delete</a>
							<label><span>Name:</span><input type="text" size="60" name="name[{$category.id}]" value="{$category.name}" /></label>
							<a href="#" title="Save" class="saveCategory"><img src="{$BASE_URL_ADMIN}img/disk.png" alt="Save" /> Save</a>
							<label><span>Title:</span><input type="text" size="60" name="title[{$category.id}]" value="{$category.title}" /></label>
							<label><span>Description:</span><input type="text" size="60" name="desc[{$category.id}]" value="{$category.description}"/></label>
							<label><span>Keywords:</span><input type="text" size="60" name="keys[{$category.id}]" value="{$category.keywords}" /></label>
							<label><span>URL:</span><input type="text" size="60" name="url[{$category.id}]" value="{$category.var_name}" /></label>
						</div>
					</div>
				{/foreach}
				</div>
				<p></p>
				<p>
					<a href="#" title="Add new category"><img src="{$BASE_URL_ADMIN}img/add.png" alt="Add new category" /> Add new category</a></p>
		</div><!-- #content -->

{include file="footer.tpl"}