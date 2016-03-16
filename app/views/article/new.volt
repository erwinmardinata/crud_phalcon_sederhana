<h3>Tambah Article Baru</h3>
{{ form('article/save', 'method' : 'post') }}

	<div class="form-group">
		<label for="title">Title</label>
		{{ text_field('title', 'class' : 'form-control') }}
	</div>
	
	<div class="form-group">
		<label for="title">Description</label>
		{{ text_area('description', 'class' : 'form-control') }}
	</div>
	
	<div class="form-group">
		<label for="category">Category</label>
		{{ select("cat_id", 'class' : 'form-control', category, 'using': ['id', 'name']) }}		
	</div>
	
	<div>
		{{ submit_button('Save', 'class' : 'btn btn-primary') }}
	</div>

{{ end_form() }}