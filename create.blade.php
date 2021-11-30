
@include('errors')

<form action="/comments" method="POST" class="add-comment-form">
	@csrf

	<div class="field">
		<label class="label">
			Sem napíšte komentár
		</label>
		<div class="control">
			<textarea name="text" rows="3" class="textarea" placeholder="napíšte komentár"></textarea>
		</div>
	</div>

	<div class="control">
		<button class="button is-warning">
			Pridať komentár
		</button>
	</div>

	<input type="hidden" name="post_id" value="{{ $post->id }}">
	<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">


</form>
