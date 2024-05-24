
<x-app-layout>
    <div class="note-container single-note">
        <h1 class="text">edit your note</h1>
        <form action="{{ route('note.update', $note)}}" method="POST" class="note">
            @csrf
            @method('PUT')
            <textarea name="note" rows="10" class="note-body">{{ $note->note }}</textarea>
            <div class="note-buttons">
            <a href="{{ route('note.index')}} " class="note-cancel-button">cancel</a>
            <button class="submit-btn">Submit</button>
        </div>
        </form>
    </div>
</x-app-layout>