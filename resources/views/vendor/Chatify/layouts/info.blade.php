{{-- user info and avatar --}}
<div class="avatar av-l"></div>
<p class="info-name">{{ config('chatify.name') }}</p>
<div class="messenger-infoView-btns">
    {{-- <a href="#" class="default"><i class="fas fa-camera"></i> Dasar</a> --}}
    <a href="#" class="danger delete-conversation"><i class="fas fa-trash-alt"></i> Hapus Percakapan</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title">bagikan gambar</p>
    <div class="shared-photos-list"></div>
</div>