<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .profile-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }
        .profile-photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 1rem;
            display: block;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2 class="text-center mb-4">Profile</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="text-center mb-4">
            @if($user->profile_photo)
                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" class="profile-photo">
            @elseif($user->gender == 'male')
                <img src="{{ asset('storage/imgfrofile/default propile pria.jpg') }}" alt="Profile Photo" class="profile-photo">
            @elseif($user->gender == 'female')
                <img src="{{ asset('storage/imgfrofile/default propile wanita.jpg') }}" alt="Profile Photo" class="profile-photo">
            @else
                <img src="{{ asset('storage/imgfrofile/default propile pria.jpg') }}" alt="Profile Photo" class="profile-photo">
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" value="{{ $user->username }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="{{ $user->email }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" value="{{ ucfirst($user->gender) }}" readonly>
        </div>

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="profile_photo" class="form-label">Ganti Foto Profile</label>
                <input type="file" class="form-control" id="profile_photo" name="profile_photo" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary w-100">Update Profile</button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
