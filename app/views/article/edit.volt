<h3>Edit Article</h3>
{{ form('article/update', 'method' : 'post') }}

	<div class="form-group">
		<label for="title">Title</label>
		{{ text_field('title', 'value' : title, 'class' : 'form-control') }}
		{{ hidden_field('id', 'value' : id, 'class' : 'form-control') }}
	</div>
	
	<div class="form-group">
		<label for="title">Description</label>
		{{ text_area('description', 'value' : description, 'class' : 'form-control') }}
	</div>
	
	<div class="form-group">
		<label for="category">Category</label>
		<select class="form-control" name="cat_id">
			{% for cat in category %}
				<option {{ cat.id == cat_id ? 'selected' : '' }} value="{{ cat.id }}">{{ cat.name }}</option>
			{% endfor %}
		</select>
	</div>
	
	<div>
		{{ submit_button('Save', 'class' : 'btn btn-primary') }}
	</div>

{{ end_form() }}