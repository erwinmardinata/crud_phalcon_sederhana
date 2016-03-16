{{ form('auth/start', 'role' : 'form', 'class' : 'form-horizontal') }}
	<div class="form-group">
		<label for="email">Email/Username</label>
		<div>
			{{ text_field('email', 'class' : 'form-control') }}
		</div>
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<div>
			{{ password_field('password', 'class' : 'form-control') }}
		</div>
	</div>
	<div class="form-group">
		{{ submit_button('Login', 'class' : 'btn btn-primary') }}
	</div>
{{ end_form() }}