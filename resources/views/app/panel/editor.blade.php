<form action="" method="POST" enctype="multipart/form-data">
  @csrf
  @method($method)
  <!-- Include stylesheet -->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

  <!-- Create the editor container -->
  <button id="submit" type="submit">Upload</button>
  <select id="language_code" name="language_code" required>
    @foreach($languages as $language)
      <option value="{{ $language->code }}"
        @if($language->code == $template->language_code)
          selected
        @endif
      >{{ $language->name }}</option>
    @endforeach
  </select>
  <div id="editor">
  </div>
  <input type="hidden" id="id" name="id" value="{{$template->id}}">
  <input type="hidden" id="content" name="content" value="">
</form>

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
  var quill = new Quill('#editor', {
    modules: {
      toolbar: [
        [{
          header: [1, 2, false]
        }],
        ['bold', 'italic', 'underline'],
        ['image', 'code-block']
      ]
    },
    placeholder: 'Compose an epic...',
    theme: 'snow' // or 'bubble'
  });
  var btn = document.getElementById('submit');
  btn.addEventListener('click', function() {
    var content = quill.root.innerHTML;
    console.log(content);
    var contentElement = document.getElementById('content');
    contentElement.value = content;
  });
</script>

@if (isset($block) && $block)
<script>
  var text = '{!! $block->content!!}';
  // removes div from content
  // TODO: replace to controller
  text = text.replace(/<\/?div(\s([a-z-]*)="[a-z-\s]*")*?>/g, '');
  console.log(text);
  quill.root.innerHTML = text;
</script>
@endif