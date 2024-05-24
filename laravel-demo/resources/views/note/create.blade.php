
<x-layout>

    <div class="note-container single-note" >
        <h1>Create new note</h1>
        <form action="{{ route('note.store')}}" method="POST" class="note"> 
            @csrf
            <textarea name="note" class="note-body" rows="10"> </textarea>
            <div class="note-buttons">
            <a href="{{ route('note.index')}} " class="note-cancel-button">cancel</a>
            <button class="submit-btn">Submit</button>
             </div>
        </form>
    </div>
</x-layout>
