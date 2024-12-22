<style>
    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .avatar-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* Menjaga gambar tetap dalam rasio kotak */
    }

    .avatar{
        width: 40px;
        height: 40px;
    }

    .caption {
        white-space: pre-wrap;
    }
    @media(max-width: 480px){
        .avatar{
            width: 30px;
            height: 30px;
        }
        .text-secondary{
            font-size: 12px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var answerButton = document.getElementById('answerButton{{ $info->id_question }}');
        var answerSection = document.getElementById('answerSection{{ $info->id_question }}');

        answerButton.addEventListener('click', function() {
            if (answerSection.style.display === 'none' || answerSection.style.display === '') {
                answerSection.style.display = 'block';
            } else {
                answerSection.style.display = 'none';
            }
        });
    });
</script>


<div>
    <div class="card mt-2 mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-1" style="align-content: center;">
                    <span class="avatar rounded-circle">
                        @if ($info->user->ustaz)
                        @if ($info->user->ustaz->gambar)
                        <img class="avatar rounded-circle"
                            src="data:image/png;base64,{{ $info->user->ustaz->gambar }}"
                            alt=""
                            style="background-color: #DBE7F9; object-fit: cover; height: 100%; width: 100%">
                        @else
                        <img class="avatar rounded-circle"
                            src="{{ asset('img/user2.png') }}"
                            alt=""
                            style="background-color: #DBE7F9; object-fit: cover; height: 100%; width: 100%">
                        @endif
                        @elseif ($info->user->murid)
                        @if ($info->user->murid->gambar)
                        <img class="avatar rounded-circle"
                            src="data:image/png;base64,{{ $info->user->murid->gambar }}"
                            alt=""
                            style="background-color: #DBE7F9; object-fit: cover; height: 100%; width: 100%">
                        @else
                        <img class="avatar rounded-circle"
                            src="{{ asset('img/user2.png') }}"
                            alt=""
                            style="background-color: #DBE7F9; object-fit: cover; height: 100%; width: 100%">
                        @endif
                        @elseif ($info->user->umum)
                        @if ($info->user->umum->gambar)
                        <img class="avatar rounded-circle"
                            src="data:image/png;base64,{{ $info->user->umum->gambar }}"
                            alt=""
                            style="background-color: #DBE7F9; object-fit: cover; height: 100%; width: 100%">
                        @else
                        <img class="avatar rounded-circle"
                            src="{{ asset('img/user2.png') }}"
                            alt=""
                            style="background-color: #DBE7F9; object-fit: cover; height: 100%; width: 100%">
                        @endif
                        @else
                        <img class="avatar rounded-circle"
                            style="background-color: #DBE7F9; object-fit: cover; height: 100%; width: 100%"
                            src="{{ asset('img/user2.png') }}" alt="">
                        @endif
                    </span>

                </div>
                <div class="col-11" style="padding-left:25px">
                    <a class="username no-underline">
                        <b>
                            @if ($info->user->ustaz)
                            <a href="{{ auth()->user()->username === $info->user->username ? route(auth()->user()->role . '.profile') : route(auth()->user()->role . '.viewprofile', $info->user->username) }}">
                                <span>{{ $info->user->ustaz->nama }}</span>
                            </a>
                            @elseif ($info->user->murid)
                            <a href="{{ auth()->user()->username === $info->user->username ? route(auth()->user()->role . '.profile') : route(auth()->user()->role . '.viewprofile', $info->user->username) }}">
                                <span>{{ $info->user->murid->nama }}</span>
                            </a>
                            @elseif ($info->user->umum)
                            <a href="{{ auth()->user()->username === $info->user->username ? route(auth()->user()->role . '.profile') : route(auth()->user()->role . '.viewprofile', $info->user->username) }}">
                                <span>{{ $info->user->umum->nama }}</span>
                            </a>
                            @else
                            <span>Nama tidak tersedia</span>
                            @endif
                        </b>
                    </a>
                    @if (auth()->check())
                    @php
                    $isFollowing = \App\Models\Follow::where('follower', auth()->user()->username)
                    ->where('following', $info->user->username)
                    ->exists();
                    @endphp

                    @if ($info->user->username != auth()->user()->username)
                    &#8226;
                    @if ($isFollowing)
                    <form action="{{ route(auth()->user()->role . '.unfollow') }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="follower" value="{{ auth()->user()->username }}">
                        <input type="hidden" name="following" value="{{ $info->user->username }}">
                        <a href="#" class="text-info" onclick="event.preventDefault(); this.closest('form').submit();">
                            Unfollow
                        </a>
                    </form>
                    @else
                    <form action="{{ route(auth()->user()->role . '.follow') }}" method="POST" style="display: inline;">
                        @csrf
                        <input type="hidden" name="follower" value="{{ auth()->user()->username }}">
                        <input type="hidden" name="following" value="{{ $info->user->username }}">
                        <a href="#" class="text-primary" onclick="event.preventDefault(); this.closest('form').submit();">
                            Follow
                        </a>
                    </form>
                    @endif
                    @endif
                    @endif



                    <div class="text-secondary" style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <a>Role: {{ ucwords($info->user->role) }} | </a>
                            <a>
                                @if ($info->user->ustaz)
                                <span>{{ $info->user->ustaz->alamat }}</span>
                                @elseif ($info->user->murid)
                                <span>{{ $info->user->murid->alamat }}</span>
                                @elseif ($info->user->umum)
                                <span>{{ $info->user->umum->alamat }}</span>
                                @else
                                <span>Alamat tidak tersedia</span>
                                @endif
                            </a>
                        </div>

                        @php
                        use Carbon\Carbon;

                        // Ambil waktu pembaruan dari $info
                        $updatedAt = Carbon::parse($info->updated_at);

                        // Dapatkan waktu sekarang
                        $now = Carbon::now();

                        // Tentukan apakah waktu pembaruan adalah hari ini atau sebelumnya
                        $isToday = $updatedAt->isToday();
                        $isYesterday = $updatedAt->isYesterday();

                        // Format output
                        $output = '';

                        if ($isToday) {
                        // Tampilkan dalam format relatif
                        $output = $updatedAt->diffForHumans();
                        } elseif ($isYesterday) {
                        // Tampilkan 'yesterday' untuk pembaruan kemarin
                        $output = 'kemarin';
                        } else {
                        // Tampilkan tanggal jika lebih dari 1 hari
                        $output = $updatedAt->format('d M Y');
                        }
                        @endphp

                        <div>
                            <a>
                                @if ($info->created_at != $info->updated_at)
                                (diubah) {{ $output }}
                                @else
                                {{ $output }}
                                @endif
                            </a>
                        </div>
                    </div>
                    <a>
                        Kategori: {{ $info->kategori }}
                    </a>
                </div>

                <!-- untuk photo/caption -->
                <div class="mt-3" style="margin-top: 10px!important;">
                    <p class="caption">{{ $info->deskripsi }}</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal{{ $info->id_question }}">
                        <!-- onclick="console.log('Modal Triggered! ID:', '{{ $info->id_question }}')" -->
                        <div class="image-container">
                            @if ($info->gambar)
                            <img src="data:image/png;base64,{{ $info->gambar }}" class="img-fluid"
                                style="max-width: 100%; height: auto;">
                            @endif
                        </div>
                    </a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="imageModal{{ $info->id_question }}" tabindex="-1" role="dialog"
                    aria-labelledby="imageModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 85vh!important;">
                        <div class="modal-content" style="background-color: unset; border: none;">
                            <div class="modal-body">
                                @if ($info->gambar)
                                <img src="data:image/png;base64,{{ $info->gambar }}" class="img-fluid"
                                    style="min-width: 100%; height: auto;">
                                @else
                                <img src="{{ asset('img/no-image.png') }}" class="img-fluid"
                                    style="max-width: 100%; height: auto;">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-1">
                    <small class="text-secondary">{{ $info->answer->count() }} komentar</small>
                </div>

                <div class="mt-2">
                    <!-- Vote Up Button -->
                    <form action="{{ route(auth()->user()->role . '.vote', $info->id_question) }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="vote_type" value="UpVote">
                        <button type="submit" class="border-0 bg-transparent p-0 {{ $info->vote && $info->vote->contains('username', auth()->user()->username) && $info->vote->firstWhere('username', auth()->user()->username)->vote_type === 'UpVote' ? 'active' : '' }}">

                            {{-- Cek apakah sudah upvote, jika sudah tampilkan ikon yang berbeda --}}
                            @if($info->vote && $info->vote->contains('username', auth()->user()->username) && $info->vote->firstWhere('username', auth()->user()->username)->vote_type === 'UpVote')
                                <!-- Ikon yang ditampilkan setelah upvote -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path d="M4 21h1V8H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2zM20 8h-7l1.122-3.368A2 2 0 0 0 12.225 2H12L7 7.438V21h11l3.912-8.596L22 12v-2a2 2 0 0 0-2-2z" fill="#4299E1"/>
                                </svg>
                            @else
                                <!-- Ikon yang ditampilkan sebelum upvote -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor" d="M234 80.12A24 24 0 0 0 216 72h-56V56a40 40 0 0 0-40-40a8 8 0 0 0-7.16 4.42L75.06 96H32a16 16 0 0 0-16 16v88a16 16 0 0 0 16 16h172a24 24 0 0 0 23.82-21l12-96A24 24 0 0 0 234 80.12M32 112h40v88H32Zm191.94-15l-12 96a8 8 0 0 1-7.94 7H88v-94.11l36.71-73.43A24 24 0 0 1 144 56v24a8 8 0 0 0 8 8h64a8 8 0 0 1 7.94 9"/>
                                </svg>
                            @endif

                            {{ $info->upvotes_count }}
                        </button>
                    </form>


                    <!-- Vote Down Button -->
                    <form action="{{ route(auth()->user()->role . '.vote', $info->id_question) }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="vote_type" value="DownVote">
                        <button type="submit" class="border-0 bg-transparent p-0 {{ $info->vote && $info->vote->contains('username', auth()->user()->username) && $info->vote->firstWhere('username', auth()->user()->username)->vote_type === 'DownVote' ? 'active' : '' }}">

                            {{-- Cek apakah sudah downvote, jika sudah tampilkan ikon yang berbeda --}}
                            @if($info->vote && $info->vote->contains('username', auth()->user()->username) && $info->vote->firstWhere('username', auth()->user()->username)->vote_type === 'DownVote')
                                <!-- Ikon yang ditampilkan setelah downvote dengan warna biru info -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path d="M20 3h-1v13h1a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zM4 16h7l-1.122 3.368A2 2 0 0 0 11.775 22H12l5-5.438V3H6l-3.937 8.649l-.063.293V14a2 2 0 0 0 2 2z" fill="#4299E1"/>
                                </svg>
                            @else
                                <!-- Ikon yang ditampilkan sebelum downvote dengan warna biru info -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor" d="m239.82 157l-12-96A24 24 0 0 0 204 40H32a16 16 0 0 0-16 16v88a16 16 0 0 0 16 16h43.06l37.78 75.58A8 8 0 0 0 120 240a40 40 0 0 0 40-40v-16h56a24 24 0 0 0 23.82-27M72 144H32V56h40Zm150 21.29a7.88 7.88 0 0 1-6 2.71h-64a8 8 0 0 0-8 8v24a24 24 0 0 1-19.29 23.54L88 150.11V56h116a8 8 0 0 1 7.94 7l12 96a7.87 7.87 0 0 1-1.94 6.29"/>
                                </svg>
                            @endif

                            {{ $info->downvotes_count }}
                        </button>
                    </form>


                    <button id="answerButton{{ $info->id_question }}" class="border-0 bg-transparent p-0">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="icon icon-tabler icon-tabler-message-circle m-0 p-0"
                             width="24" height="24"
                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M3 20l1.3 -3.9c-2.324 -3.437 -1.426 -7.872 2.1 -10.374c3.526 -2.501 8.59 -2.296 11.845 .48c3.255 2.777 3.695 7.266 1.029 10.501c-2.666 3.235 -7.615 4.215 -11.574 2.293l-4.7 1">
                            </path>
                        </svg>
                    </button>


                    <div class="float-end">
                        <svg role="button" data-bs-toggle="dropdown" xmlns="http://www.w3.org/2000/svg"
                            class="mt-2 icon icon-tabler icon-tabler-dots" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                            <path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                        </svg>
                        <div class="dropdown-menu">
                            @if (auth()->check() && $info->user->username === auth()->user()->username)
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editquestionModal{{ $info->id_question }}">
                                <svg role="button" xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-edit me-2" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                    <path d="M16 5l3 3"></path>
                                </svg>
                                Edit
                            </a>

                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#hapusquestionModal{{ $info->id_question }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-trash me-2" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 7l16 0"></path>
                                    <path d="M10 11l0 6"></path>
                                    <path d="M14 11l0 6"></path>
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                </svg>
                                Delete</a>
                            @endif
                            @if (auth()->check() && $info->user->username != auth()->user()->username)
                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#reportModal{{ $info->id_question }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="me-2 icon icon-tabler icon-tabler-alert-circle" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                    <path d="M12 8v4"></path>
                                    <path d="M12 16h.01"></path>
                                </svg>
                                Report
                            </a>
                            @endif
                        </div>
                    </div>

                    <!-- Report Modal -->
                    <div class="modal fade" id="reportModal{{ $info->id_question }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form id="reportForm{{ $info->id_question }}" action="{{ route(auth()->user()->role . '.reportQuestion', $info->id_question ) }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <b>Report Post</b>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label" style="color: #000000;">Reason</label>
                                            <textarea name="reason" id="reason" class="border rounded-0 form-control summernote" rows="6" placeholder="Write something" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-ghost-secondary btn-pill" data-bs-dismiss="modal" id="ReportcancelButton{{ $info->id_question }}">Cancel</button>
                                        <button type="submit" class="btn btn-primary btn-pill">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const modalElement = document.getElementById('reportModal{{ $info->id_question }}');
                            modalElement.addEventListener('hide.bs.modal', function() {
                                // Reset form fields
                                document.getElementById('reportForm{{ $info->id_question }}').reset();
                            });
                        });
                    </script>



                    <!-- Edit Question Modal -->
                    <div class="modal fade" id="editquestionModal{{ $info->id_question }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form id="editquestionsForm{{ $info->id_question }}" action="{{ route(auth()->user()->role . '.editquestion', $info->id_question ) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <b>Edit Post</b>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3" style="display: flex">
                                            <div class="col-4">
                                                <select id="editkategori{{ $info->id_question }}" name="kategori" class="form-control" style="color: #b2b2b3!important;">
                                                    <option value="" disabled selected>{{ $info->kategori }}</option>
                                                    <option style="color: black!important;" value="Aqidah" {{ $info->kategori == 'Aqidah' ? 'disabled' : '' }}>Aqidah</option>
                                                    <option style="color: black!important;" value="Fiqih" {{ $info->kategori == 'Fiqih' ? 'disabled' : '' }}>Fiqih</option>
                                                    <option style="color: black!important;" value="Sirah" {{ $info->kategori == 'Sirah' ? 'disabled' : '' }}>Sirah</option>
                                                    <option style="color: black!important;" value="Lainnya" {{ $info->kategori == 'Lainnya' ? 'disabled' : '' }}>Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="col-8" style="display:flex; justify-content: flex-end;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" onclick="document.getElementById('editfileInput{{ $info->id_question }}').click();">
                                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                        <path d="M15 8h.01M3 6a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3z" />
                                                        <path d="m3 16l5-5c.928-.893 2.072-.893 3 0l5 5" />
                                                        <path d="m14 14l1-1c.928-.893 2.072-.893 3 0l3 3" />
                                                    </g>
                                                </svg>
                                                <input type="file" id="editfileInput{{ $info->id_question }}" name="image" style="display: none;" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" style="color: #000000;">Deskripsi</label>
                                            <textarea name="deskripsi" class="border rounded-0 form-control summernote" rows="6" placeholder="{{ $info->deskripsi }}">{{ $info->deskripsi }}</textarea>
                                        </div>
                                        <div id="preview{{ $info->id_question }}" style="display: flex; justify-content:center; cursor: pointer;" onclick="document.getElementById('editfileInput{{ $info->id_question }}').click();">
                                            <img id="imagePreview{{ $info->id_question }}" src="{{ $info->gambar ? 'data:image/png;base64,' . $info->gambar : asset('img/no-image.png') }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-ghost-secondary btn-pill" data-bs-dismiss="modal" id="editcancelButton{{ $info->id_question }}">Cancel</button>
                                        <button type="submit" class="btn btn-primary btn-pill">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const fileInput = document.getElementById('editfileInput{{ $info->id_question }}');
                            const preview = document.getElementById('imagePreview{{ $info->id_question }}');
                            const defaultImageSrc = "{{ $info->gambar ? 'data:image/png;base64,' . $info->gambar : asset('img/no-image.png') }}";

                            fileInput.addEventListener('change', function(event) {
                                // console.log('File input changed:', event.target.files);

                                if (event.target.files && event.target.files[0]) {
                                    const reader = new FileReader();

                                    reader.onload = function(e) {
                                        // console.log('FileReader result:', e.target.result);

                                        preview.src = e.target.result;
                                    };

                                    reader.readAsDataURL(event.target.files[0]);
                                }
                            });

                            const modalElement = document.getElementById('editquestionModal{{ $info->id_question }}');
                            modalElement.addEventListener('hide.bs.modal', function() {
                                // Reset file input
                                fileInput.value = '';
                                // Reset preview image
                                preview.src = defaultImageSrc;
                                // Reset form fields
                                document.getElementById('editquestionsForm{{ $info->id_question }}').reset();
                            });
                        });
                    </script>

                    <!-- Delete Question modal -->
                    <div class="modal fade" id="hapusquestionModal{{ $info->id_question }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Hapus</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus pertanyaan?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form id="question-form" action="{{ route(auth()->user()->role . '.hapusquestion', $info->id_question ) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Report Modal -->
                    <div class="modal fade" id="reportModal" tabindex="-1" role="dialog"
                        aria-labelledby="reportModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content" style="width: 30%">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="reportModalLabel">Report Issue</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Isi modal di sini -->
                                    <textarea name="" id="" cols="50" rows="3" placeholder="Tuliskan sesuatu..."
                                        style="height: 40px"></textarea>
                                    Apakah Anda yakin ingin melaporkan masalah ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Kirim Laporan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Konten yang ditampilkan atau disembunyikan -->
                <div id="answerSection{{ $info->id_question }}" class="mt-2" style="display: none;">
                    @include('home.answer')
                </div>
            </div>
        </div>
    </div>
</div>
