{% for data in article %}
{% if loop.first %}
<table border=1 align="center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Cat Id</th>
            <th>action</th>
        </tr>
    </thead>
{% endif %}
    <tbody>
        <tr>
            <td>{{ data.id }}</td>
            <td>{{ data.title }}</td>
            <td>{{ data.description }}</td>
            <td>{{ data.category.name }}</td>
            <td>
				{{ link_to('article/edit/' ~ data.id, 'edit', 'class' : 'btn btn-primary') }} | 
				{{ link_to('article/delete/' ~ data.id, 'hapus', 'class' : 'btn btn-warning', 'onclick' : 'return confirm("anda yakin?")') }} 
			</td>
        </tr>
    </tbody>
{% if loop.last %}
    </table>
{% endif %}
{% else %}
    No data
{% endfor %}

{{ link_to('auth/end', 'logout', 'class' : 'btn btn-primary') }} |
{{ link_to('article/new', 'Add', 'class' : 'btn btn-primary') }}